## __개발환경__
    
1. DB : MariaDB
    - 선택한 데이터(넷플릭스 컨텐츠)의 양이 방대하기 때문에 MySQL보다 가볍고 빠른처리를 지원하는 MariaDB를 선택했다. 
    또한 MariaDB는 서브 쿼리와 조인 쿼리 최적화를 지원하는 장점이 있는데, 일반적으로 테이블 수정과 관리를 효율적으로 하기 위해 데이터를 여러 테이블에 나누어 저장하기 때문에 조인 연산이 빈번하게 일어날 것으로 예상했다. 이에 따라  MariaDB가 적합하다고 생각되어 선택했다.
2. Backend Language : PHP

3. Frontend Language : HTML, CSS

4. Web Server : Linux와 Apache Web Server 
    - linux는 자유 라이선스, 대부분의 네트워크 프로토콜 지원, 우수한 보안성 등의 장점이 있기때문에 IT산업 전반에서 가장 많이 사용되는 서버용 OS이다. 따라서 Linux환경에 익숙해지기 위해 linux를 선택했다.


#

 ## __발견한 정보__
0. 설명 : 캐글에서 *Netflix Movies and TV Shows* 데이터를 가져왔다.
아래 사진은 데이터의 일부이다.
![netflix](https://user-images.githubusercontent.com/48701368/97781815-2eaaea80-1bd1-11eb-8d42-433069a3dcc9.PNG)
쿼리에서 조인을 사용하고 싶어서 이 데이터를 분할해서 3개의 테이블에 나누어 저장했다.
 - actors 테이블 : 컨텐츠에 출연한 출연자 정보 테이블

    ![actors](https://user-images.githubusercontent.com/48701368/97780260-dff85300-1bc6-11eb-88e8-3dfaa673aff0.PNG)

 - contents 테이블 : 컨텐츠 요약 정보(제목과 설명) 테이블

    ![contents](https://user-images.githubusercontent.com/48701368/97780270-f6061380-1bc6-11eb-9572-2583c9e4e032.PNG)

- info 테이블 : 컨텐츠 상세 정보(종류, 감독, 국가, 개봉년도, 관람등급, 관람시간, 장르) 테이블

    ![info](https://user-images.githubusercontent.com/48701368/97780321-4c735200-1bc7-11eb-8be6-cf48494cc0b0.PNG)

1. 넷플릭스 컨텐츠 정보 중 사용자가 검색한 출연자 이름으로 해당 출연자가 출연한 컨텐츠의 정보(컨텐츠의 종류, 컨텐츠 제목, 감독, 출연자, 컨텐츠 제작 국가, 개봉년도, 관람등급, 관람시간, 장르)를 조회한다.
    - 쿼리 :  ![actors_q](https://user-images.githubusercontent.com/48701368/97780085-cacef480-1bc5-11eb-97b0-6ecf627f925f.PNG)
   
    - 설명 : 3개의 테이블, info테이블과 actors테이블, contents테이블을 조인해서 *actors*테이블의 *cast*컬럼에 사용자가 입력한 배우이름이 포함된 행의 type, director,country, release_year, rating, duration, listed_in(info테이블), title, description(contents 테이블), cast(actors 테이블) 정보를 가져온다.

2. 넷플릭스 컨텐츠 정보 중 사용자가 선택한 장르로 해당 장르의 컨텐츠의 정보(컨텐츠의 종류, 컨텐츠 제목, 감독, 출연자, 컨텐츠 제작 국가, 개봉년도, 관람등급, 관람시간, 장르)를 조회한다.
    - 쿼리 :  ![genre_q](https://user-images.githubusercontent.com/48701368/97780094-d6222000-1bc5-11eb-9120-f210d4950a0c.PNG)

    - 설명 : 3개의 테이블, info테이블과 actors테이블, contents테이블을 조인해서 *info*테이블의 *listed_in*컬럼에 사용자가 선택한 장르가 포함된 행의 type, director,country, release_year, rating, duration, listed_in(info테이블), title, description(contents 테이블), cast(actors 테이블) 정보를 가져온다.
3. 넷플릭스 컨텐츠 정보 중 사용자가 선택한 국가로 해당 국가가 제작한 컨텐츠의 정보(컨텐츠의 종류, 컨텐츠 제목, 감독, 출연자, 컨텐츠 제작 국가, 개봉년도, 관람등급, 관람시간, 장르)를 조회한다.
     - 쿼리 :  ![country_q](https://user-images.githubusercontent.com/48701368/97780100-dfab8800-1bc5-11eb-93e5-0c1ac7569c39.PNG)

    - 설명 : 3개의 테이블, info테이블과 actors테이블, contents테이블을 조인해서 *info*테이블의 *country*컬럼과 사용자가 선택한 국가가 포함된 행의 type, director,country, release_year, rating, duration, listed_in(info테이블), title, description(contents 테이블), cast(actors 테이블) 정보를 가져온다.

4. 넷플릭스 컨텐츠 정보 중 사용자가 검색한 컨텐츠 제목으로 해당 타이틀의 컨텐츠 정보(컨텐츠의 종류, 컨텐츠 제목, 감독, 출연자, 컨텐츠 제작 국가, 개봉년도, 관람등급, 관람시간, 장르)를 조회한다.
     - 쿼리 :
     ![title_q](https://user-images.githubusercontent.com/48701368/97780114-f520b200-1bc5-11eb-8ee3-a52c1f41f6c4.PNG)

    - 설명 : 3개의 테이블, info테이블과 actors테이블, contents테이블을 조인해서 *contents*테이블의 *title*컬럼과 사용자가 입력한 title이 일치하는 행의 type, director,country, release_year, rating, duration, listed_in(info테이블), title, description(contents 테이블), cast(actors 테이블) 정보를 가져온다.

#

## __동작영상__

<https://youtu.be/KzCvSTOD9L0>
