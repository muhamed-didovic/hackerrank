#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


void print_list(vector<int> list) {
    for (vector<int>::iterator it=list.begin(); it != list.end(); ++it) {
        cout << *it << " ";
    }
};

void pairs(vector<int> list, int k) {
    int p = 0;
    
    /*
    for (int i = 0; i < list.size(); i++) {
        for (int j = i + 1; j < list.size(); j++) {
            if (abs(list[j] - list[i]) == k) {
                p++;
            }
        }
    }
    */
    int index = 0;
    for (vector<int>::iterator it=list.begin(); it != list.end(); ++it) {
        index++;
        for (auto it2 = list.begin() + index; it2 != list.end(); ++it2) {
            if ( abs(*it2 - *it) == k ) {
                p++;
            }
        }
    }
    
    cout << p << endl;
}

int main() {
   
    int n, k;
    vector<int> list;

    cin >> n;
    cin >> k;
    for (int i=0; i<n; i++) {
        int x;
        cin >> x;
        list.push_back(x);
    }
  
    //print_list(list);
    pairs(list, k);

    return 0;
}
