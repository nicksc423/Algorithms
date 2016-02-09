<?php 
  //here node has two hooks: $prev and $next
  //singly linked list's node only has one hook (e.g. $next) while doubly linked list's node has two hooks (e.g. $next and $prev)
  class Node {
    public $value, $prev, $next;
    public function __construct($value)
    {
      $this->value = $value;
    }
  }
  //implementation of linked list
  class DoublyLinkedList {
    public $head, $tail;
    public function __construct(){
      $this->head = NULL; //have the head point to NULL
      $this->tail = NULL; //have the tail point to NULL
    }
    public function add($value){
      if(is_null($this->head)) {
        $node = new Node($value);
        $this->head = $node;
        $this->tail = $node;
      } else {
        $current = $this->head;
        while($current->next) {
          $current = $current->next;
        }
        $node = new Node($value);
        $node->prev = $current;
        $current->next = $node;
        $this->tail = $node;
      }
    }
    //finds the node at the $pos position
    public function find($pos){
      $current = $this->head;
      for($i=0; $i<$pos;$i++) {
        $current = $current->next;
      }
      return $current->value;
    }
    //finds all nodes with the value of $value
    public function findAllNodesWithValueOf($value){
      $current = $this->head;
      $nodeArray = array();
      while($current) {
        if($current->value == $value) {
          $nodeArray[] = $current;
        }
        $current = $current->next;
      }
      return $nodeArray;
    }
    //removes all nodes with the value of $value
    public function removeAllNodesWithValueOf($value){
      $iterator;
      $current = $this->head;
      while($current) {
        //we found a node to remove
        if($current->value == $value) {
          //if we are at the head reset the head
          if($this->head == $current) {
            $newHead = $current->next;
            //
            // workaround so we dont set a null prop = to null again
            //
            if($newHead) {
              $newHead->prev = null;
            }
            $this->head = $current->next;
          } elseif($this->tail == $current) {
            $newTail = $current->prev;
            //
            // workaround so we dont set a null prop = to null again
            //
            if($newTail) {
              $newTail->next = null;
            }
            $this->head = $current->next;
          }
          
        //it is not the head or tail so we can just delink from list without worry, yay!
        } else {
          $current->prev->next = $current->next;
          $current->next->prev = $current->prev;
        }
        $current = $current->next;
      }
    }
    //removes the node at the $pos position
    public function removeNode($pos){
      $current = $this->head;
      for($i=0; $i<$pos;$i++) {
        $current = $current->next;
      }
      $current->prev->next = $current->next;
      if(!is_null($current->next)) {
        $current->next->prev = $current->prev;
      }
    }
    //inserts a new value in the specified position
    public function insert($pos, $value){
      $current = $this->head;
      for($i=0; $i<$pos;$i++) {
        $current = $current->next;
      }
      $newNode = new Node($value);
      $newNode->prev = $current->prev;
      $newNode->next = $current;
      $current->prev = $newNode;
    }

    public function length() {
      $counter = 0;
      $current = $this->head;
      while($current) {
        $counter++;
        $current = $current->next;
      }
      return $counter;
    }

    public function printValues(){
      $node = $this->head;  //have $node point to where $this->head is pointing to
      if($node == NULL) {  //if $node points to NULL
        echo "Linked List is empty";
        return NULL;
      }
      while($node->next != NULL){
        echo "Node value is " . $node->value ."<br />";
        $node = $node->next;  //now have $node point to where $node->next is pointing to
      }
      echo "Node value is " . $node->value ."<br />"; //have it print the last node value
    }
  }
?>
































