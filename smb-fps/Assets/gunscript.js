var cameraObject: GameObject;
var targetXRotation: float;
var targetYRotation: float;
var targetXRotationV: float;
var targetYRotationV: float;
var rotateSpeed: float = 0.1;
var holdHeight: float = -0.2;
var holdSide: float = -0.1;
var ratioHipHold: float = 1;
var ratioHipHoldV: float;
var hipToAimSpeed: float = 0.1;
var aimRatio: float = 0.4;
var zoomAngle: float = 30;
var fireSpeed: float = 5;
var waitTilNextFire: float = 0;
var bullet: GameObject;
var bulletSpawn: GameObject;
var shootAngleRandomizationAiming: float = 5;
var shootAngleRandomizationNotAiming: float = 15;
var recoilAmount: float = 0.01;
var recoilRecoverTime: float = 0.2;
var currentRecoilZPos: float;
var currentRecoilZPosV: float;
var bulletSound: GameObject;
var flash: GameObject;
var gunbobAmountX: float = 0.1;
var gunbobAmountY: float = 0.1;
var currentGunbobX: float;
var currentGunbobY: float;
var beingHeld: boolean = false;
var outsideBox: GameObject;
var countToThrow: int = -1;
var playerTransform: Transform;
var playerMovementScript: playermovementscript;


// On load
function Awake(){
  countToThrow = -1;
  playerTransform = GameObject.FindWithTag("Player").transform;
  playerMovementScript = GameObject.FindWithTag("Player").GetComponent(playermovementscript);
  cameraObject = GameObject.FindWithTag("MainCamera");
}

// At each frame
function Update(){

  if(beingHeld){
  
    rigidbody.useGravity = false;
    outsideBox.GetComponent(Collider).enabled = false;
  
    // Gunbob
    currentGunbobX = Mathf.Sin(cameraObject.GetComponent(mouselookscript).headbobStepCounter) * gunbobAmountX * ratioHipHold;
    currentGunbobY = Mathf.Cos(cameraObject.GetComponent(mouselookscript).headbobStepCounter * 2) * gunbobAmountY * -1 * ratioHipHold;
    
    // Vars (object holders)
    var holdSound: GameObject;
    var holdFlash: GameObject;

    // Handle left click (fire, different accuracy if aiming or not, wait between two bullets)
    if(Input.GetButton("Fire1")){
      if(waitTilNextFire <= 0){
        
        // Bullet
        if(bullet){
          Instantiate(bullet, bulletSpawn.transform.position, bulletSpawn.transform.rotation);
        }
        
        // Sound
        if(bulletSound){
          holdSound = Instantiate(bulletSound, bulletSpawn.transform.position, bulletSpawn.transform.rotation);
        }
        
        // Flash
        if(flash){
          holdFlash = Instantiate(flash, bulletSpawn.transform.position, bulletSpawn.transform.rotation);
        }
        
        // Inaccuracy
        targetXRotation += (Random.value - 0.5) * Mathf.Lerp(shootAngleRandomizationAiming, shootAngleRandomizationNotAiming, ratioHipHold);
        targetYRotation += (Random.value - 0.5) * Mathf.Lerp(shootAngleRandomizationAiming, shootAngleRandomizationNotAiming, ratioHipHold);
        
        // Recoil
        currentRecoilZPos -= recoilAmount;
       
        // Wait
        waitTilNextFire = 1;
        
      }
    }
    
    // Decrement wait time
    waitTilNextFire -= Time.deltaTime * fireSpeed;
    
    // Keep the current sound attached to the gun
    if(holdSound){
      holdSound.transform.parent = transform;
    }
    
    // Keep the current flash attached to the gun
    if(holdFlash){
      holdFlash.transform.parent = transform;
    }
    
    currentRecoilZPos = Mathf.SmoothDamp(currentRecoilZPos, 0, currentRecoilZPosV, recoilRecoverTime);
    
    // Handle right click (aim / move weapon in front of you / zoom / move camera slower when you do it)
    cameraObject.GetComponent(mouselookscript).currentTargetCameraAngle = zoomAngle;
    if(Input.GetButton("Fire2")){
      cameraObject.GetComponent(mouselookscript).currentAimRatio = aimRatio;
      ratioHipHold = Mathf.SmoothDamp(ratioHipHold, 0, ratioHipHoldV, hipToAimSpeed);
    }
    if(Input.GetButton("Fire2") == false){
      cameraObject.GetComponent(mouselookscript).currentAimRatio = 1;
      ratioHipHold = Mathf.SmoothDamp(ratioHipHold, 1, ratioHipHoldV, hipToAimSpeed);
    }

    // Compute where to place the weapon
    transform.position = cameraObject.transform.position + (Quaternion.Euler(0, targetYRotation, 0) * Vector3(holdSide * ratioHipHold + currentGunbobX, holdHeight * ratioHipHold + currentGunbobY, 0) + Quaternion.Euler(targetXRotation, targetYRotation, 0) * Vector3(0, 0, currentRecoilZPos));

    // Compute how to rotate the weapon
    targetXRotation = Mathf.SmoothDamp(targetXRotation, cameraObject.GetComponent(mouselookscript).xRotation, targetXRotationV, rotateSpeed);
    targetYRotation = Mathf.SmoothDamp(targetYRotation, cameraObject.GetComponent(mouselookscript).yRotation, targetYRotationV, rotateSpeed);
    
    // Rotate
    transform.rotation = Quaternion.Euler(targetXRotation, targetYRotation, 0);
  }
  
  // If the weapon is on the ground
  if(!beingHeld){
  
    // Use physics
    rigidbody.useGravity = true;
    outsideBox.GetComponent(Collider).enabled = true;
    countToThrow -= 1;
    if(countToThrow == 0){
      rigidbody.AddRelativeForce(0, playerMovementScript.throwGunUpForce, playerMovementScript.throwGunForwardForce);
    }
    
    // Pick up
    if(Vector3.Distance(transform.position, playerTransform.position) < playerMovementScript.distToPickUpGun && Input.GetButton("Use Key") && playerMovementScript.waitFrameForSwitchGuns <= 0){
      playerMovementScript.currentGun.GetComponent(gunscript).beingHeld = false;
      playerMovementScript.currentGun.GetComponent(gunscript).countToThrow = 2;
      playerMovementScript.currentGun = gameObject;
      beingHeld = true;
      targetYRotation = cameraObject.GetComponent(mouselookscript).yRotation - 160;
      playerMovementScript.waitFrameForSwitchGuns = 30;
      
    }
  }
}