<pre style="white-space:pre-wrap;overflow-wrap:anywhere">{{ is_scalar($value) || $value === null ? $value : json_encode($value, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) }}</pre>
