ECHO OFF
CLS
:MENU
ECHO.
ECHO  ******* WELCOME TO MAJHIWALA EXECUTOR *******
ECHO ...............................................
ECHO.
ECHO 1 - Open Xampp8
ECHO 2 - Open PhpStorm 
ECHO 3 - Open Chrome
ECHO 4 - Open Xampp8, PhpStorm And Chrome
ECHO 5 - EXIT
ECHO.

SET /P M=Type 1, 2, 3, 4 or 5 then press ENTER:
IF %M%==1 GOTO XAMPP8
IF %M%==2 GOTO PHPSTORM
IF %M%==3 GOTO CHROME
IF %M%==4 GOTO BOTH
IF %M%==5 GOTO EOF

:XAMPP8
cd C:\xampp\
start xampp-control.exe
CLS
GOTO MENU

:PHPSTORM
cd C:\Program Files\JetBrains\PhpStorm 2020.3.2\bin\
start phpstorm64.exe
CLS
GOTO MENU

:CHROME
cd C:\Program Files\Google\Chrome Dev\Application\
start chrome.exe
CLS
GOTO MENU

:BOTH
cd C:\xampp\
start xampp-control.exe
cd C:\Program Files\JetBrains\PhpStorm 2020.3.2\bin\
start phpstorm64.exe
cd C:\Program Files\Google\Chrome Dev\Application\
start chrome.exe
CLS
GOTO MENU