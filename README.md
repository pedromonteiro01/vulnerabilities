## Project 1: Vulnerabilities

- Work done by:
    - Pedro Monteiro 97484
    - Renato Dias 98380
    - José Trigo 98597
    - Eduardo Fernandes 98512

<br>

- Projet folder organization:
    - [analysis](https://github.com/detiuaveiro/project-1---vulnerabilities-equipa_4/tree/master/analysis): contains all prints, scripts, results and the report.pdf file about the project
    - [app](https://github.com/detiuaveiro/project-1---vulnerabilities-equipa_4/tree/master/app): contains the vulnerable application, all vulnerabilities will be inside that folder. To run this app we can execute the next command:
    ```
    docker-compose up
    ```
    It will be possible to see a website on https://127.0.0.1:8000/
    - [app_sec](https://github.com/detiuaveiro/project-1---vulnerabilities-equipa_4/tree/master/app_sec): contains the safe app, protected from all implemented vulnerabilities in the vulnerable app. To run it we can execute the same command:
    ```
    docker-compose up
    ```
    - [db](https://github.com/detiuaveiro/project-1---vulnerabilities-equipa_4/tree/master/db): contains all files related to the mySQL database

- Report and prints of the project can be found on [analysis folder](/analysis/)

## SOME EXAMPLES

### SQL INJECTION
![SQL Injection](/analysis/prints/sqlinjection/vulnerability/login_successful.png)

### MALICIOUS FILE INJECTION
![Malicious File](/analysis/prints/upload_vulnerability/vulnerability/inject_ls_command.png)

### XSS ATTACK
![XSS](/analysis/prints/xss/vulnerability/xss_image.png)