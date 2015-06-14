var destroyAfterTime: float = 20;
var destroyAfterTimeRandomization: float = 10;
var countToTime: float;

function Awake(){

  // Choose bullethole time to live (20-30s)
  destroyAfterTime += Random.value * destroyAfterTimeRandomization;
}

function Update () {

  // Destroy bullethole after the delay
  countToTime += Time.deltaTime;
  if(countToTime >= destroyAfterTime){
    Destroy(gameObject);
  }
}