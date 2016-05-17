//
//  BinarySearchTreeNode.swift
//  BinarySearchTree
//
//  Created by Nicholas Solow-Collins on 2/29/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation
class BinarySearchTreeNode<T>: Node<T> {
    var left: BinarySearchTreeNode<T>?
    var right: BinarySearchTreeNode<T>?
    init(value: T, leftNode: BinarySearchTreeNode<T>?, rightNode: BinarySearchTreeNode<T>?) {
        left = leftNode
        right = rightNode
        super.init(value: value)
    }
}

