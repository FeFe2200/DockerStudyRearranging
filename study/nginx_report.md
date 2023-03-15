# nginx_report

## nginx란?
경량 웹서버이다.<br/>
클라이언트로부터 요청을 받았을 떄 요청에 맞는 정적 파일을 응답해주는 HTTP Web Server로 활용되거나,<br/>
Reverse Proxy Server로 활용하여 WAS 서버의 부하를 줄일 수 있는 로드 밸런서로 활용 되기도 한다.<br/>

### 웹서버란?
이미지, 동영상, 자바스크립트, HTML, 등 다양한 문서를 제공하는 서버 시스템입니다.<br/>
주로 HTTP 통신 프로토콜을 통해 리소스를 전달하지만 FTP, SMTP와 같은 <br/>
다른 프로토콜도 지원하는 것이 대부분이다.<br/>

### Proxy Server란?
클라이언트가 자신을 통해서 다른 네트워크 서비스에 간접적으로 접속할 수 있게 해 주는 컴퓨터 시스템이나<br/>
응용 프로그램을 가리킨다. 서버와 클라이언트 사이에 중계기로서 대리로 통신을 수행하는 것을 가리켜 ‘프록시’,<br/>
그 중계 기능을 하는 것을 프록시 서버라고 부른다.<br/>
포워드프록시서버(forward proxy server)와 리버스프록시서버(reverse proxy server)로 나눠진다.<br/>
기관에 속한 유저가 특정 컨텐츠에 접근하는 것을 방지하는데 사용된다.<br/>
포워드 프록시 서버를 사용하면 유저의 정체를 숨겨준다.<br/>


### forward Proxy Server란?
흔히 말하는 ‘프록시 서버’란 포워드 포록시 서버를 의미.<br/>
프록시 서버는 아래 그림처럼 클라이언트 앞에 놓여 있습니다.<br/>
다음 그림을 보면 클라이언트가 인터넷 웹서버에 요청을 보내면 중간에서 그 요청을 프록시 서버가 가로챕니다.<br/>
그리고나서 프록시 서버는 해당 요청을 웹서버에게 다시 보내고<br/>
웹서버에게 받은 응답을 다시 클라이언트에게 전달한다.<br/>

### Reverse Proxy Server란?
포워드 프록시 서버는 클라이언트 앞에 놓여져 있는 반면, 리버스 프록시 서버는 웹서버 앞에 놓여 있습니다.<br/>
리버스 프록시 서버는 로드 밸런싱(load balancing)에 사용된다.<br/>
서버의 IP 주소를 노출시킬 필요가 없습니다.<br/>
성능 향상을 위해 캐시 데이터를 저장할 수 있습니다.<br/>
<br/>
포워드 프록시 서버를 사용하면 클라이언트와 직접 통신하는 웹서버가 없다는 것을 알 수 있습니다.<br/>
반면 리버스 프록시 서버를 사용하면 웹서버와 직접 통신하는 클라이언트가 없다는 것을 알 수 있습니다.<br/>

### 로드 밸런서란?
서버에 가해지는 부하(=로드)를 분산(=밸런싱)해주는 장치 또는 기술을 통칭한다.<br/>
클라이언트와 서버풀(Server Pool, 분산 네트워크를 구성하는 서버들의 그룹) 사이에 위치하며,<br/>
한 대의 서버로 부하가 집중되지 않도록 트래픽을 관리해 각각의 서버가 최적의 퍼포먼스를 보일 수 있도록 한다.<br/>

## nginx 흐름
Nginx는 Event-Driven 구조로 동작하기 때문에 한 개 또는 고정된 프로세스만 생성하여 사용하고,<br/>
비동기 방식으로 요청들을 Concurrency(동시성)하게 처리할 수 있습니다.<br/>
Nginx는 새로운 요청이 들어오더라도 새로운 프로세스와 쓰레드를 생성하지 않기 때문에<br/>
프로세스와 쓰레드 생성 비용이 존재하지 않고, 적은 자원으로도 효율적인 운용이 가능합니다.<br/>
이러한 Nginx의 장점 덕분에 단일 서버에서도 동시에 많은 연결을 처리할 수 있습니다.<br/>

### Event-Driven
apache 의 C10K 문제점 해결(한 시스템에 동시 접속자수가 1만명이 넘어갈 때 효율적방안)을 위해 만들어진<br/>
Event-Driven 구조의 웹서버SW 라고 합니다.<br/>
OSI7 Layer 중 application Level 아래의 Level 에서 Nginx 같은 웹서버가 HTTP 통신을 담당합니다.<br/>

## nginx 구조
Nginx는 하나의 Master Process와 다수의 Worker Process로 구성되어 실행됩니다.<br/>
Master Process는 설정 파일을 읽고, 유효성을 검사 및 Worker Process를 관리합니다.<br/>
모든 요청은 Worker Process에서 처리합니다. Nginx는 이벤트 기반 모델을 사용하고,<br/>
Worker Process 사이에 요청을 효율적으로 분배하기 위해 OS에 의존적인 메커니즘을 사용합니다.<br/>
Worker Process의 개수는 설정 파일에서 정의되며, 정의된 프로세스 개수와 사용 가능한 CPU 코어 숫자에<br/>
맞게 자동으로 조정됩니다.<br/>


## nginx 내부 Server Block File설정 방법(포트연결, 사이트)
https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-on-centos-7#step-three-%E2%80%94-create-new-server-block-files<br/>

## nginx openssl 설정 방법
```C
apt-get -y install vim openssl
openssl req -newkey rsa:4096 -days 365 -nodes -x509 -subj "/C=KR/ST=Seoul/L=Seoul/O=42Seoul/OU=FREE/CN=localhost" -keyout localhost.dev.key -out localhost.dev.crt
mv localhost.dev.crt etc/ssl/certs/
mv localhost.dev.key etc/ssl/private/
chmod 600 etc/ssl/certs/localhost.dev.crt etc/ssl/private/localhost.dev.key

/*
파일 키파일이름과 인증서는 아래에서도 사용되므로 그대로 유지하거나, 바꾼다면 config를 바꿀 때 까먹지 말고 같이 바꿔주어야한다.
-req : 인증서 요청 및 인증서 생성 유틸.
-rsa : 4096 방식으로 localhost.dev.key으로 공개키 만듬.
-newkey : 개인키를 생성하기 위한 옵션.
-keyout <키 파일 이름> : 키 파일 이름을 지정.
-out <인증서 이름> : 인증서 이름을 지정.
-days 365 : 인증서의 유효기간을 작성하는 옵션.
-nodes는 nginx를 킬떄 암호 입력하지 않고 ssl이 작동하도록 해줌.

C == 나라;
ST == 도시;
L == 시/도;
O == 기관명;
OU == 회사/팀;
CN == 도메인 이름;
*/
```