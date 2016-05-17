//
//  TrieNode.swift
//  Trie
//
//  Created by Nicholas Solow-Collins on 3/1/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation
class TrieNode<T: Equatable>: Node<T> {
    var char: String
    var next =  Array<TrieNode<T>>()
    init(chr: String, value: T?) {
        char = chr
        super.init(value: value)
    }
}