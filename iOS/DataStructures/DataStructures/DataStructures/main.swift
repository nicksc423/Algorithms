//
//  main.swift
//  DataStructures
//
//  Created by Nicholas Solow-Collins on 2/29/16.
//  Copyright © 2016 Nicholas Solow-Collins. All rights reserved.
//

import Foundation

var list = SinglyLinkedList<Int>()
list.insertNodeWithValue(newValue: 10);
list.displayNodes()
list.insertNodeWithValue(newValue: 11, afterNodeWithValue: 10)
list.displayNodes()
list.insertNodeWithValue(newValue: 9)
list.displayNodes()

