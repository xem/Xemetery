var currentGun: GameObject;
var distToPickUpGun: float = 6;
var throwGunUpForce: float = 100;
var throwGunForwardForce: float = 300;
var waitFrameForSwitchGuns: int = -1;

var walkAcceleration: float = 900;
var walkAccelerationAirRatio: float = 0.3;
var walkDeceleration: float = 0.5;
var walkDecelerationVelx: float;
var walkDecelerationVelz: float;
var cameraObject: GameObject;
var maxWalkSpeed: float = 10;
var horizontalMovement: Vector2;
var jumpVelocity: float = 100;
var grounded: boolean = false;
var maxSlope: float = 60;
var crouchRatio: float = 0.1;
var transitionToCrouchSec: float = 0.2;
var crouchV: float;
var currentCrouchRatio: float = 1;
var originalLocalScaleY: float;
var crouchLocalScaleY: float;
var collisionDetectionSphere: GameObject;

// On load
function Awake(){
  
  // Initialize crouch
  currentCrouchRatio = 1;
  originalLocalScaleY = transform.localScale.y;
  crouchScaleY = transform.localScale.y * crouchRatio;
}

function Update () {

  waitFrameForSwitchGuns -= 1;

  // Crouch
  transform.localScale.y = Mathf.Lerp(crouchLocalScaleY, originalLocalScaleY, currentCrouchRatio);
  if(Input.GetButton("Crouch")){
    currentCrouchRatio = Mathf.SmoothDamp(currentCrouchRatio, 0.6, crouchV, transitionToCrouchSec);
  }
  if(Input.GetButton("Crouch") == false && collisionDetectionSphere.GetComponent(collisiondetectionspherescript).collisionDetected == false){
    currentCrouchRatio = Mathf.SmoothDamp(currentCrouchRatio, 1, crouchV, transitionToCrouchSec);
  }

  // Make a vector with current velocity
  horizontalMovement = Vector2(rigidbody.velocity.x, rigidbody.velocity.z);
  
  // Limit it
  if(horizontalMovement.magnitude > maxWalkSpeed){
    horizontalMovement = horizontalMovement.normalized; // this makes a vector of ones
    horizontalMovement *= maxWalkSpeed; // this multiplies each member of the vector by maxWalkSpeed
  }
  
  // Apply it
  rigidbody.velocity.x = horizontalMovement.x;
  rigidbody.velocity.z = horizontalMovement.y;
  
  // When we stop pressing a button, decelerate (if grounded)
  if(grounded){
  	rigidbody.velocity.x = Mathf.SmoothDamp(rigidbody.velocity.x, 0, walkDecelerationVelx, walkDeceleration );
  	rigidbody.velocity.z = Mathf.SmoothDamp(rigidbody.velocity.z, 0, walkDecelerationVelz, walkDeceleration );
  }
  
  // Turn according to camera orientation
  transform.rotation = Quaternion.Euler(0, cameraObject.GetComponent(mouselookscript).currentYRotation, 0);
  
  // Accelerate when pressing arrow buttons (if grounded. less if not.)
  if(grounded){
    rigidbody.AddRelativeForce(Input.GetAxis("Horizontal") * walkAcceleration * Time.deltaTime, 0, Input.GetAxis("Vertical") * walkAcceleration * Time.deltaTime);
  }
  else{
    rigidbody.AddRelativeForce(Input.GetAxis("Horizontal") * walkAcceleration * walkAccelerationAirRatio * Time.deltaTime, 0, Input.GetAxis("Vertical") * walkAcceleration * walkAccelerationAirRatio * Time.deltaTime);
  }
  
  // Start a jump when pressing space if we're grounded
  if(Input.GetButton("Jump") && grounded){
  	rigidbody.AddForce(0, jumpVelocity, 0);
  }
}

// If collision with a floor that's not too slopy, we're grounded
function OnCollisionStay(collision: Collision){
  for(var contact: ContactPoint in collision.contacts){
  	if(Vector3.Angle(contact.normal, Vector3.up) < maxSlope){
  	  grounded = true;
  	}
  }
}

// If no collision, consider we're in the air
function OnCollisionExit(){
  grounded = false;
}