<?php 
	include('doublyLinkedList.php');

	class HashTable{
	  	public $rooms, $num_rooms=100;
		//when a new hashTable is created, initialize the rooms with 100 instances of an empty linked list
		public function __construct(){
		  for($i=0; $i<$this->num_rooms; $i++){
		    $this->rooms[] = new DoublyLinkedList();
		  }
		}
		
		//Bob Jenkins' One-at-a-Time hash
		function hash($value) {
			$char = str_split($value);
			$length = count($char);
		    $h = 0;

		    for ($i = 0; $i < $this->num_rooms; $i++) {
		        $h += ord($char[$i]);
		        $h += ($h << 10);
		        $h ^= ($h >> 6);
		    }

		    $h += ($h << 3);
		    $h ^= ($h >> 11);
		    $h += ($h << 15);

		    $h = $h % $this->num_rooms;

		    //since php doesnt have unsigned ints this should be a work around(?)
		    if($h < 0) {
		    	$h *= -1;
		    }
		    return $h;
		}

		//add a new node with the value of $value
		public function add($value){
			$hash = $this->hash($value);
			$this->rooms[$hash]->add($value);
		}
		//return an array of all instances of the nodes with the value of $value
		public function findAllNodesWithValueOf($value){
		  $hash = $this->hash($value);
		  return $this->rooms[$hash]->findAllNodesWithValueOf($value);
		}
		//removes all nodes with the value of $value
		public function removeAllNodesWithValueOf($value){
		  $hash = $this->hash($value);
		  $this->rooms[$hash]->removeAllNodesWithValueOf($value);
  		}
	}
?>