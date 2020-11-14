## **새로배운 내용** ##

 - java.sql 패키지 주요 클래스와 인터페이스
    - Connection : DBMS와 연결 수행, DBMS에 SQL 전달할 객체 리턴 
    - DriverManager : 드라이버 로딩 및 DB 연결
    - ResultSet : select 실행한 결과 가져오기
         - get*Type*() : 서버에서 가져온 레코드의 컬럼 값 가져오기 (*Type* : Int, String, ...)
    - SQLException 
    - JDBC - SQL 쿼리 전송 인터페이스 : 자바에서 db로 쿼리문 전송
        - Statement
        - PreparedStatement ✔ 동적쿼리, 재사용, 빠른 실행(미리 컴파일)
        - CallableStatement
        - 사용시 반드시 try cathch문 또는 throws 처리

- 트랜잭션
    - DB의 상태를 변환시키는 하나의 논리적 기능을 수행하기 위한 작업의 단위
    - 한꺼번에 모두 수행되어야 할 일련의 연산들
    - commit of rollback

- 리팩토링
    - DB 접속 이후 자원을 반납하지 않으면 DB서버가 해당 SQL문의 결과를 계속 저장하고 있어야 하므로 메모리 낭비 발생

- java
    - finally : 예외여부와 관계없이 실행되는 로직
   
#

## **문제 발생 및 해결 과정** ##
- sql문에서 오타가 있었던 것을 빼고는 큰 문제는 없었다.


#

## **참고 내용** ##
1. java.sql 패키지 주요 인터페이스 : <https://uoonleen.tistory.com/45>

2. 자바 예외처리 : <https://url.kr/Nv3waH>

#

## **회고** ##

- (+) : 리팩토링할때 closeAll()메서드를 추가해서 중복되는 코드를 줄인 것이 좋았다.

- (-) : 아쉬운 점은 없다!

- (!) : try, catch 구문은 알고 있었는데 finally는 처음 알았다.

#
## **동작영상** ##
<https://youtu.be/vDp-GPrgBJQ>
