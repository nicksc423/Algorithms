//
//  SinglyLinkedNode.swift
//  DataStructures
//
//  Created by Nicholas Solow-Collins on 2/29/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//
import Foundation
class SinglyNode<T>: Node<T> {
    var next: SinglyNode<T>?
    init(value: T, nextNode: SinglyNode<T>?) {
        self.next = nextNode
        super.init(value: value)
    }
}
