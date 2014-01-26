/SELECT\s+.+\s+INTO\s+OUTFILE/i,
/LOAD\s+DATA\s+(LOCAL\s+)?INFILE\s+/i,
/create\s+function/i,
/SELECT\s+.+\s+FROM\s+.+\s+INTO\s+DUMPFILE\s*/i,
/select\s+.*(concat\s*\(\s*substring\s*\(\s*)*load_file\s*\(.*\)\s*;*/i,
/insert\s+into\s+.+\s+values\s*\(\s*load_file\s*\(.*\)\s*\)\s*;*/i,
/GRANT\s+ALL\s+PRIVILEGES\s+ON/i,
/system\s*\(\s*[^\)]+\s*\)\s*/i,
/fsockopen\s*\(\s*\"udp:\/\//i,
/pcntl_fork\s*\(/i,
/proc_open\s*\(/i,
/\$OOO0O0O00=__FILE__;\$OOO000000=urldecode\(/i,
/\\x65\\x76\\x61\\x6c\\x28/i,
<rule>/[^\w\d]*?(eval|assert)\s*\(\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\]\s*\)\s*;*/i,
/eval\s*\(\s*base64_decode\([^\)]+\s*\)\s*\)?\s*;*/i,
/eval\s*\(\s*(gzuncompress|gzinflate)\s*\(\s*base64_decode\([^\)]+\s*\)\s*\)\s*\)\s*\;*/i,
/\$_(POST|GET|REQUEST|SESSION)\[[^\]]+?\]\s*\(\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\]\s*(,\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\]\s*)*\)\s*;*/i,
/(include|require)(_once)*\s*\(*\s*[\'\"]*[^\s]*?\.(jpg|png|gif|bmp)[\'\"]*\s*\)*\s*;/i,
/echo\s*`\$_(POST|GET|REQUEST|SESSION)\[.+\]`\s*;*/i,
/(include|require)(_once)*\s*\(*\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\]\s*\)*\s*;*/i,
/file_put_contents\s*\(\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\](\.[\'\"]{2})*\s*,\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\](\.[\'\"]{2})*\s*\)\s*;*/i,
/file_put_contents\s*\(\s*\$_SERVER\[[\'\"]HTTP_.+?[\'\"]\]\s*,\s*\$_SERVER\[[\'\"]HTTP_.+?[\'\"]\]\s*\)\s*;*/i,
/preg_replace\s*\([\'\"]\/.+\/e[\'\"]\s*,\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\]\s*,\s*[^\)]+\)\s*;*/i,
/eval\s*\(str_rot13\s*\([\'\"]riny\([^\)]+\);[\'\"]\s*\)\s*\)\s*;*/i,
<rule>/(\$[^\s]+)\s*=\s*base64_decode\([^\)]+\)\s*;*/i<==>/(eval|gzinflate)\s*\(\s*\\1\s*\)\s*;*/i,
/(\$[^\s]+)\s*=\s*\$_(POST|GET|REQUEST|SESSION)\[.+?\]\s*;*/i<==>/fwrite\s*\([^,]+\s*,\s*(stripslashes\s*\()*?\\1\)*?\s*\)\s*;*/i,
/(\$[^\s]+)\s*=\s*fsockopen\s*\(/i<==>/fwrite\s*\(\s*\\1/i