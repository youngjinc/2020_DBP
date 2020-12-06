## **새로배운 내용** ##

 - mongoDB
    - NoSQL
        - 확장성
        - 높은 성능
        - 빠른 속도
        - 스키마 X -> (키, 값)

    - 문서지향 DB
        - BSON(Binary JSON) 형태로 각 문서저장

    - Node.js에서 가장 많이 사용하는 DB


    - 구조
        - database
            - collections
                - documents
    
    - 문법
        - insert : db.컬렉션명.insertOne({x:1}) 
        - select : db.컬렉션명.find({x:1})
        - update : db.컬렉션명.updateOne({x:1}, {$set:{y:7}})
        - delete : db.컬렉션명.deleteOne({x:1})
        - insertMany, updateMany, deleteMany ...

#

## **문제 발생 및 해결 과정** ##
- 오류 없이 수월하게 진행됐다.

#

## **참고 내용** ##
[mongoDB란?](https://edu.goorm.io/learn/lecture/557/%ED%95%9C-%EB%88%88%EC%97%90-%EB%81%9D%EB%82%B4%EB%8A%94-node-js/lesson/174384/mongodb%EB%9E%80)

#

## **회고** ##

- (+) : Compass로 쉽게 DB 작업을 할 수 있어서 좋았다.

- (-) : 아직 익숙하지 않아서 그런지 쿼리랑 구조가 복잡하게 느껴졌다.

- (!) : 데이터베이스 개론 수업 때 말로만 듣던 mongoDB를 다뤄볼 수 있게되어 신기했다.

#
## **동작영상** ##
[14주차 동작영상](https://youtu.be/a_LImeSExt0)
