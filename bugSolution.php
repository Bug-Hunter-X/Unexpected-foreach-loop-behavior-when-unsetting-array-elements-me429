function foo(array &$arr) {
  $keysToRemove = [];
  foreach ($arr as $key => $value) {
    if ($value === 'a') {
      $keysToRemove[] = $key;
    }
  }

  foreach ($keysToRemove as $key) {
    unset($arr[$key]);
  }
  return $arr; 
}

$arr = ['a', 'b', 'a', 'c'];
print_r(foo($arr)); // Output: Array ( [1] => b [3] => c )