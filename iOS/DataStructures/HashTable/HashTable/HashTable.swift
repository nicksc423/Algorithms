//
//  HashTable.swift
//  HashTable
//
//  Created by Nicholas Solow-Collins on 3/1/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation
struct HashTable<T> {
    var table = Array<T?>()
    var linkBuilt = false
    var stringBuilt = false
    func stringToAscii(str: String) -> Int {
        let string = str as NSString
        return Int(string.characterAtIndex(0))
    }
    func simpleHash(data: String) -> Int {
        return stringToAscii(data) - 65
    }
}
extension HashTable {
    mutating func linkPut(data: String) {
        if linkBuilt == false {
            for _ in 0...25 {
                table.append(SinglyLinkedList<String>() as? T)
            }
            linkBuilt = true
        }
        var list = table[simpleHash(data)] as! SinglyLinkedList<String>
        list.unshift(data)
    }
    func linkGet(data: String) -> SinglyNode<String>? {
        if let found = table[simpleHash(data.uppercaseString)] {
            let sll = found as! SinglyLinkedList<String>
            return sll.findNodeWithValue(data)
        } else {
            return nil
        }
    }
    mutating func simplePut(data: String) {
        if stringBuilt == false {
            for _ in 0...25 {
                table.append(nil)
            }
            stringBuilt = true
        }
        table[simpleHash(data.uppercaseString)] = data as? T
    }
    func simpleGet(data: String) -> String? {
        if let found = table[simpleHash(data.uppercaseString)] {
            return found as? String
        } else {
            return nil
        }
    }
}