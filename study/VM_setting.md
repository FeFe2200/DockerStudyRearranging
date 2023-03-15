VirtualBox에서 설정->네트워크(고급)->포트 포워딩 >> 호스트 ip에 ipconfig getifaddr en0dlqfur
기본 포트 호스트는 2222, 게스트(가상머신)는 22.
호스트의 포트번호를 22로 해서 접속이 안된 것
추가로 이것 참고

마운트
sudo mount -t vboxsf [VirtualBox에서 설정한 공유폴더 이름] [마운트할 폴더]

https://bono915.tistory.com/entry/VirtualBox-Linux-%ED%8F%AC%ED%8A%B8%ED%8F%AC%EC%9B%8C%EB%94%A9-%EC%84%A4%EC%A0%95-%EB%B0%8F-ssh-%EC%97%B0%EA%B2%B0-%EB%B0%A9%EB%B2%95
https://www.crocus.co.kr/1647

도커에서 워드프레스를 연결하기 위한 기본 설명서
https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-with-docker-compose

172.17.0.3  Bcast:172.17.255.255  Mask:255.255.0.0