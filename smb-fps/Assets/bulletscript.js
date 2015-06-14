var maxDist: float = 1000000000;
var decalHitWall: GameObject;
var floatInFrontOfWall: float = 0.001;
function Update () {
  
  // Show a bullethole if bullet hits a level part
  var hit: RaycastHit;
  if(Physics.Raycast(transform.position, transform.forward, hit, maxDist)){
    if(decalHitWall && hit.transform.tag == "Level Parts"){
      Instantiate(decalHitWall, hit.point + (hit.normal * floatInFrontOfWall), Quaternion.LookRotation(hit.normal));
    }
  }
  Destroy(gameObject);
}