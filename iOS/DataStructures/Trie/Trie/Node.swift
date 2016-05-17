//
//  Node.swift
//  Trie
//
//  Created by Nicholas Solow-Collins on 3/1/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation
class Node<T> {
    var value: T?
    init(value: T?) {
        self.value = value
    }
}