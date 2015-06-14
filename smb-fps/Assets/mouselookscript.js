var defaultCameraAngle: float = 60;
var currentTargetCameraAngle: float = 60;
var ratioZoom: float = 1;
var ratioZoomV: float;
var ratioZoomSpeed: float = 0.05;
var lookSensitivity: float = 5;
var yRotation: float;
var xRotation: float;
var currentYRotation: float;
var currentXRotation: float;
var yRotationV: float;
var xRotationV: float;
var lookSmoothDamp: float = 0.1;
var currentAimRatio: float = 1;
var headbobSpeed: float = 1;
var headbobStepCounter: float;
var headbobAmountX: float = .5;
var headbobAmountY: float = .3;
var parentLastPos: Vector3;
var eyeHeightRatio: float = 0.9;


// On load
function Awake(){

  // Remember where the parent is
  parentLastPos = transform.parent.position;
}

// At each frame
function Update () {

  // Headbob
  if(transform.parent.GetComponent(playermovementscript).grounded){
    headbobStepCounter += Vector3.Distance(parentLastPos, transform.parent.position) * headbobSpeed;
  }
  transform.localPosition.x = Mathf.Sin(headbobStepCounter) * headbobAmountX * currentAimRatio;
  transform.localPosition.y = (Mathf.Cos(headbobStepCounter * 2) * headbobAmountY * currentAimRatio) + (transform.parent.localScale.y * eyeHeightRatio) - (transform.parent.localScale.y / 2);

  parentLastPos = transform.parent.position;
  
  // Zoom on right click
  if(currentAimRatio == 1){
    ratioZoom = Mathf.SmoothDamp(ratioZoom, 1, ratioZoomV, ratioZoomSpeed);
  }
  else{
    ratioZoom = Mathf.SmoothDamp(ratioZoom, 0, ratioZoomV, ratioZoomSpeed);
  }
  
  camera.fieldOfView = Mathf.Lerp(currentTargetCameraAngle, defaultCameraAngle, ratioZoom);

  // Get mouse position to compute rotation
  yRotation += Input.GetAxis("Mouse X") * lookSensitivity * currentAimRatio;
  xRotation -= Input.GetAxis("Mouse Y") * lookSensitivity * currentAimRatio;
  
  // Limit it
  xRotation = Mathf.Clamp(xRotation, -90, 90);
  
  // Smooth it
  currentXRotation = Mathf.SmoothDamp(currentXRotation, xRotation, xRotationV, lookSmoothDamp);
  currentYRotation = Mathf.SmoothDamp(currentYRotation, yRotation, yRotationV, lookSmoothDamp);
  
  // Apply it to camera
  transform.rotation = Quaternion.Euler(currentXRotation, currentYRotation, 0);
}