//
//  BinarySearchTree.swift
//  BinarySearchTree
//
//  Created by Nicholas Solow-Collins on 2/29/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation

struct BinarySearchTree<T: Comparable> {
    var root: BinarySearchTreeNode<T>? = nil
    // we have to specify mutating because this method could potentially change the value of instance
    mutating func insertNodeWithValue(val: T) {
        root = insertNodeFor(root, value: val)
    }
    private func insertNodeFor(node: BinarySearchTreeNode<T>?, value: T) -> BinarySearchTreeNode<T> {
        if node == nil {
            return BinarySearchTreeNode(value: value, leftNode: nil, rightNode: nil)
        } else {
            if value < node!.value {
                node!.left = insertNodeFor(node!.left, value: value)
            } else {
                node!.right = insertNodeFor(node!.right, value: value)
            }
            return node!
        }
    }
    
    // prints the nodes in order
    func inOrder(node: BinarySearchTreeNode<T>?) {
        if node == nil {
            return
        } else {
            preOrder(node!.left)
            print(node!.value)
            preOrder(node!.right)
        }
    }
    
    // prints the nodes in preOrder
    func preOrder(node: BinarySearchTreeNode<T>?) {
        if node == nil {
            return
        } else {
            print(node!.value)
            preOrder(node!.left)
            preOrder(node!.right)
        }
    }
    
    //prints the nodes in postOrder
    func postOrder(node: BinarySearchTreeNode<T>?) {
        if node == nil {
            return
        } else {
            postOrder(node!.left)
            postOrder(node!.right)
            print(node!.value)
        }
    }
}