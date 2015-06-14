var floatAbove: float = 0.1;
var playerCapsuleTransform: Transform;
var collisionDetected: boolean = false;

// At each frame
function Update () {

  // Place sphere collider so as it almost touches the top of the head of the player 
  transform.position.x = playerCapsuleTransform.position.x;
  transform.position.z = playerCapsuleTransform.position.z;
  transform.position.y = playerCapsuleTransform.position.y + ((playerCapsuleTransform.GetComponent(Collider).height * playerCapsuleTransform.localScale.y) / 2) + (transform.localScale.y / 2) + floatAbove;
}

// While there's a collision happening with the level
function OnCollisionStay(collision: Collision){
  if(collision.transform.tag == "Level Parts"){
    collisionDetected = true;
  }
}

// When there's no more a collision happening with the level
function OnCollisionExit(){
  collisionDetected = false;
}