//: this could probably be improved

import UIKit

func bSort(var arr: [Int]) -> [Int] {
    var iteration = 0;
    var i: Int;
    var j: Int;
    for i=0; i<arr.count;++i {
        for j=0; j<arr.count-iteration; j++ {
            if j+1 != arr.count - iteration {
                if arr[j] > arr[j+1] {
                    let temp = arr[j]
                    arr[j] = arr[j+1]
                    arr[j+1] = temp;
                    
                }
            }
        }
        ++iteration
    }
    return arr
}

func populatArray()->[Int] {
    var arr = Array<Int>()
    var iter: Int;
    for(iter=0; iter<10; ++iter) {
        arr.append(Int(arc4random_uniform(10000)))
    }
    return arr
}

print(bSort(populatArray()))

