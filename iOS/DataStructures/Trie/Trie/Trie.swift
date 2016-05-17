//
//  Trie.swift
//  Trie
//
//  Created by Nicholas Solow-Collins on 3/1/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation
struct Trie<T: Equatable> {
    var root: TrieNode<T>
    init(character: String) {
        root = TrieNode<T>(chr: character, value: nil)
    }
    func insert(word: String, value: T) {
        var wordArray = Array(word.uppercaseString.characters)
        var current = root
        for var i = 1; i < wordArray.count; ++i {
            var found = false
            for var j = 0; j < current.next.count; ++j {
                if current.next[j].char == String(wordArray[i]) {
                    current = current.next[j]
                    found = true
                }
            }
            if found == false {
                let node = TrieNode<T>(chr: String(wordArray[i]), value: nil)
                current.next.append(node)
                current = node
            }
        }
        current.value = value
    }
    func get(word: String) -> T? {
        var wordArray = Array(word.uppercaseString.characters)
        var current: TrieNode<T>? = root
        for var i = 1; i < wordArray.count; ++i {
            var found = false;
            for var j = 0; j < current!.next.count; ++j {
                if current!.next[j].char == String(wordArray[i]) {
                    current = current!.next[j]
                    found = true
                }
            }
            if found == false {
                current = nil
                break
            }
        }
        if current != nil && current!.value != nil {
            return current!.value
        } else {
            return nil
        }
    }
}