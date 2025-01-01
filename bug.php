function foo(array $arr) {
  foreach ($arr as $key => $value) {
    if ($value === 'a') {
      unset($arr[$key]);
    }
  }
  return $arr; 
}

$arr = ['a', 'b', 'a', 'c'];
print_r(foo($arr)); // Output: Array ( [1] => b [3] => c )

// The bug is that if the loop tries to unset an element that's already unset in previous iterations, it won't throw an error or warning, but it won't produce the expected result. For example, in this case, we remove the 'a' in index 0, then iterate to the index 2. The index 2 element was 'a' before the loop unset it. Now the loop will continue without accessing the 'a' value because it's already unset.