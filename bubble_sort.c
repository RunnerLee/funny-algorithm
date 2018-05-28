#include <stdio.h>
#include <stdlib.h>

int main()
{
    int arr[10], i, k, temp;

    srand(0);

    for (i = 0; i < 10; i++) {
        arr[i] = rand();
    }

    for (i = 0; i < 8; i++) {
        for (k = 0; k < 8 - i; k++) {
            temp = arr[k + 1];
            if (arr[k] > temp) {
                arr[k + 1] = arr[k];
                arr[k] = temp;
            }
        }
    }

    for (i = 0; i < 9; i++) {
        printf("%d\n", arr[i]);
    }
}