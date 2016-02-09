<?php 
	Class SinglyLinkedList {
		function __construct() {
			$this->head = null;
			$this->tail = null;
		}

		function push($val) {
			//if there is no head node, create it
			if($this->head == null) {
				$this->head = new Node($val);
			} else {
				//iterate through the list
				$current = $this->head;

				while($current->next) {
					$current = $current->next;
				}
				//add new node
				$current->next = new Node($val);
			}
		}

		function remove($val) {
			//check if we want to delete the head node
			if($this->head->value == $val) {
				$this->head = $this->head->next;
			} else {
				//iterate through the list till we match the val
				$current = $this->head;
				while($current->value != $val && $current->next) {
					$current = $current->next;
				} 
				//we're either at the end of the array or we made a match
				$temp = $current->next->next;
				$current->next = $temp;

			}
		}

		function find($val) {
			//start at the head
			$current = $this->head;
			while($current != null) {
				//check if its the correct node
				if($current->value == $val) {
					//if it is return
					return $current;
				}
				//else iterate
				$current = $current->next;
			}
			//if we got here we could not find the val
			return false;
		}

		function printValues() {
		   //traverse the list and print the values
		   $current = $this->head;
		   while($current)
		   {
		      echo $current->value . '<br>';
		      $current = $current->next;
		   }
		}

		function insert($valueAfter, $newValue) {
			//start at the head
			$current = $this->head;
			while($current != null) {
				//check if valueAfter is the correct node
				if($current->value == $valueAfter) {
					//oldNode is the old next value
					$oldNode = $current->next;
					//make a new node
					$newNode = new Node($newValue);
					//make the new node linked to the old node
					$newNode->next = $oldNode;
					//link the current node to the new node
					$current->next = $newNode;
					return true;
				}
				//else iterate
				$current = $current->next;
			}
			//if we got here we could not find the valueAfter
			return false;
		}

		function isEmpty() {
			return is_null($this->head);
		}

		function removeDups($val) {

			if(!$this->isEmpty()) {
				$found = false;
				
				//start at the head
				$current = $this->head;
				//check the head
				if($current->value == $val) {
					$found = true;
				}
				//set the previous value
				$previous = $this->head;
				//go to the next value
				$current = $current->next;

				//iterate through the rest of the array
				while($current != null) {
					//if it matches the value
					if($current->value == $val) {
						//if it isnt the first time we've seen this value
						if($found) {
							//unlink current
							$previous->next = $current->next;

						} else { //else it must be the first time we found the value, keep on looking
							$found = true;
						}
					}
					//set previous so we can find it
					$previous = $current;
					//iterate
					$current = $current->next;
				}
				return true;
			}

			//if we get here array was empty IE no values to remove
			return false;
		}
	}

	Class Node {
		function __construct($val) {
			$this->value=$val;
			$this->next = null;
		}
	}

	$newList = new SinglyLinkedList();
	$newList->push(1);
	$newList->push(2);
	$newList->push(3);
	$newList->push(1);
	$newList->push(4);
	$newList->push(5);
	$newList->printValues();

	echo "<h2> test </h2>";

	$newList->removeDups(1);
	$newList->printValues();
 ?>