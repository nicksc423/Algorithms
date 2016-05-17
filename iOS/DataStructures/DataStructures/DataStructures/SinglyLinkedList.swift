//
//  SinglyLinkedList.swift
//  DataStructures
//
//  Created by Nicholas Solow-Collins on 2/29/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation

import Foundation
struct SinglyLinkedList<T: Equatable> {
    var head: SinglyNode<T>?
    
    //returns the node with the first instance of value
    func findNodeWithValue(value: T) -> SinglyNode<T>? {
        //if head is not null
        if var currentNode = head {
            //iterate until we find node
            while currentNode.value != value {
                //if there is a next node iterate
                if let nextNode = currentNode.next {
                    currentNode = nextNode
                } else {
                    //if we got here we are at end of list and didnt find the node
                    return nil
                }
            }
            return currentNode
        } else {
            return nil
        }
    }
    
    //returns the first instance of the node before the node with value
    func findNodeBeforeNodeWithValue(beforeValue bVal: T) -> SinglyNode<T>? {
        if var currentNode = head {
            while currentNode.next != nil && currentNode.value != bVal {
                currentNode = currentNode.next!
            }
            if currentNode.next != nil {
                return currentNode
            } else {
                return nil
            }
        } else {
            return nil
        }
    }
    
    
    // we use this method when we are inserting SinglyNodes after the first instance of a node with value afterVal
    func insertNodeWithValue(newValue newVal: T, afterNodeWithValue afterVal: T) -> Bool {
        let newNode = SinglyNode(value: newVal, nextNode: nil)
        if let currentNode = findNodeWithValue(afterVal) {
            newNode.next = currentNode.next
            currentNode.next = newNode
            return true
        } else {
            return false
        }
    }
    
    // we use this method when we are inserting SinglyNodes at the end of the list
    mutating func insertNodeWithValue(newValue newVal: T) -> SinglyNode<T> {
        let newNode = SinglyNode(value: newVal, nextNode: nil)
        //if the head is not null we add to the end of the list, else we add to the head
        if var currentNode = head {
            //if there is a next node iterate
            while currentNode.next != nil {
                //since we check in the while conditional this shouldn't fail
                currentNode = currentNode.next!
            }
            //we get here once currentNode.next is nil
            //no we add the newNode to the end
            currentNode.next = newNode;

        } else {
            head = newNode
        }
        return newNode
    }
    
    //removes the first instance of a node with value
    mutating func removeNodeWithValue(value: T) -> Bool {
        if head != nil {
            //if the head is the node to remove
            if(head!.value == value) {
                head = head!.next
                return true
            }
            //if we got here then we didnt want to remove head
            if var previousNode = findNodeBeforeNodeWithValue(beforeValue: value) {
                previousNode.next = previousNode.next!.next
                return true
            } else {
                return false
            }
        } else {
            return false
        }
    }
    
    //prints the values of each of the nodes
    func displayNodes() {
        if var currentNode = head {
            //print the head
            print(currentNode.value)
            
            //if there is a next node iterate
            while currentNode.next != nil {
                //since we check in the while conditional this shouldn't fail
                currentNode = currentNode.next!
                print(currentNode.value)
            }
        } else {
            print("List is empty")
        }
    }
    
    // MARK: Stack Methods
    //removes the head of the linked list
    mutating func shift() -> SinglyNode<T>? {
        if var currentNode = head {
            head = head!.next
            currentNode.next = nil
            return currentNode
        } else {
            return nil
        }
    }
    
    //adds to the head
    mutating func unshift(newVal: T) -> SinglyNode<T> {
        let newNode = SinglyNode(value: newVal, nextNode: head)
        head = newNode
        return newNode
    }
    
    //MARK: Queue Methods
    //enqueue and unshift are the same
    mutating func enqueueNodeWithValue(newVal: T) -> SinglyNode<T> {
        return unshift(newVal)
    }
    
    //removes the last value in the list
    mutating func dequeue() -> SinglyNode<T>? {
        //if the head node exists
        if var currentNode = head {
            //if we want to remove the head node
            if head!.next != nil {
                while currentNode.next!.next != nil {
                    currentNode = currentNode.next!
                }
                //we are now previous to the end node
                let nodeToRemove = currentNode.next!
                currentNode.next = nil
                return nodeToRemove
            } else {
                //if we got here, head is the only value in the list
                let nodeToRemove = head!
                head = nil
                return nodeToRemove
            }
        } else {
            return nil
        }
    }
}