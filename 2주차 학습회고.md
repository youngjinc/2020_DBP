**새로배운 내용**
    
    - 인터넷의 규모가 커지면서 사람이 수작업으로 웹페이지 만드는 것이 한계에 도달했고, php탄생하게된다.(동적인 페이지가 만들어짐)

    - 클라이언트와 서버, php, mysql의 관계
        - 클라이언트가 네트워크를 통해 웹서버로 정보를 요청한다. 
        - 웹서버는 html해석 기능은 있지만 php코드는 해석할 수 없으므로 php프로그램에 처리를 요청한다.
        - php에서 DB에 저장된 값을 사용할때 mysql에 요청한다.
        
    - php와 mysql을 연동하는 방법 : mysqli 
        - mysqli_connect 
        - mysqli_query
        - mysqli_error
        - mysqli_fetch_array)

    - php
        - 변수 : $
        - 정보전달방식 : GET, POST
        - isset : 변수가 설정되었는지 확인해주는 함수


**문제 발생 및 해결 과정**

    process_create.php 페이지에서 데이터 저장 과정 중 에러가 발생 했다.
    먼저 error.log 파일의 위치를 찾아보았고 위치는 C:\ > Bitnami > wampstack > apache2 > logs였다.
    로그 파일을 확인해보니 sql 구문 에러였고, create.php 페이지에서 타이틀에 "'"가 포함된 값을 입력해놓고 escape 처리하지 않은 것이 원인이었음을 알게되었다.
    "'"는 SQL에서 특수 문자이기 때문에 리터럴 문자열 데이터의 일부로 사용하려면 escape 처리해야한다는 사실을 잊고있었던 것이었다.
    "'"을 "''"로 수정해서 데이터를 입력하여 해결하였다.

**참고 내용**
    
    https://www.php.net/manual/en/mysqli.query

**회고**

    + 윈도우 터미널은 신세계다. cmd창 불편했는데 이걸로 리눅스 명령어도 사용할 수 있어서 편리했고, 무엇보다 탭기능이 신박하다.
    - 가만히 앉아서 강의 영상 시청하는게 힘들다.
    ! 클라이언트와 서버, php, mysql의 관계를 명확하게 알 수 있었다.
