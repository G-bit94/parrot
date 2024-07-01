<script>
    // javascript implementation to find
    // minimum number of deletions
    // to make a sorted sequence
    /* lis() returns the length
    of the longest increasing
    subsequence in arr[] of size n */
    function lis(arr, n) {
        let result = 0;
        let lis = new Array(n);

        /* Initialize LIS values
        for all indexes */
        for (let i = 0; i < n; i++)
            lis[i] = 1;

        /* Compute optimized LIS
        values in bottom up manner */
        for (let i = 1; i < n; i++)
            for (let j = 0; j < i; j++)
                if (arr[i] > arr[j] &&
                    lis[i] < lis[j] + 1)
                    lis[i] = lis[j] + 1;

        /* Pick resultimum
        of all LIS values */
        for (let i = 0; i < n; i++)
            if (result < lis[i])
                result = lis[i];

        return result;
    }

    // function to calculate minimum
    // number of deletions
    function minimumNumberOfDeletions(arr, n) {

        // Find longest increasing
        // subsequence
        let len = lis(arr, n);

        // After removing elements
        // other than the lis, we
        // get sorted sequence.
        return (n - len);
    }

    let arr = [9, 44, 32, 12, 7, 42, 34, 92, 35, 37, 41, 8, 20, 27, 83, 64, 61, 28, 39, 93, 29, 17, 13, 14, 55, 21, 66, 72,
        23, 73, 99, 1, 2, 88, 77, 5, 65, 83, 84, 62, 5, 11, 74, 68, 76, 78, 67, 75, 69, 70, 22, 71, 24, 25, 26
    ];
    let n = arr.length;
    alert("Minimum number of deletions = " +
        minimumNumberOfDeletions(arr, n) + "Array Length: " + n);

    // This code is contributed by vaibhavrabadiya117.
</script>