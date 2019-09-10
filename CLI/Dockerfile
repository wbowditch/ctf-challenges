FROM ubuntu:16.04

RUN apt-get update && apt-get install -y openssh-server vim
RUN mkdir /var/run/sshd
RUN echo 'root:test' | chpasswd
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# SSH login fix. Otherwise user is kicked off after login
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd

ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile

EXPOSE 22

# CHALLENGE 1
RUN useradd -ms /bin/bash  fresher01
RUN echo 'fresher01:enusec' | chpasswd
RUN echo "fresher{bread_n_butter}" > /home/fresher01/flag
RUN chmod 0750 /home/fresher01

# CHALLENGE 2
RUN useradd -ms /bin/bash  fresher02
RUN mkdir /home/fresher02/directory
RUN echo 'fresher02:fresher{bread_n_butter}' | chpasswd
RUN echo "fresher{test2}" > /home/fresher02/directory/.flag
RUN chmod 0750 /home/fresher02

CMD ["/usr/sbin/sshd", "-D"]