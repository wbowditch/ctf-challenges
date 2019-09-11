FROM ubuntu:16.04

RUN apt-get update && apt-get install -y openssh-server vim
RUN mkdir /var/run/sshd
RUN echo 'root:test' | chpasswd
COPY sshd_config /etc/ssh/sshd_config
RUN cat /etc/ssh/sshd_config
RUN set service ssh allow-root
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
RUN echo "fresher{bread_n_raisins}" > /home/fresher02/directory/.flag
RUN chmod 0750 /home/fresher02

# CHALLENGE 3
RUN useradd -ms /bin/bash  fresher03
RUN echo 'fresher03:fresher{bread_n_raisins}' | chpasswd
COPY --chown=fresher03:root data.txt /home/fresher03/data.txt
RUN chown "fresher03" "/home/fresher03/data.txt"

RUN chmod 0750 /home/fresher03

# CHALLENGE 4
RUN useradd -ms /bin/bash  fresher04
RUN echo 'fresher04:fresher{letitgrep}' | chpasswd
COPY --chown=fresher04:root data2.txt /home/fresher04/data.txt
RUN chown "fresher04" "/home/fresher04/data.txt"
RUN chmod 0750 /home/fresher04

# CHALLENGE 5
RUN useradd -ms /bin/bash  fresher05
RUN useradd -ms /bin/bash  fresher06
RUN echo 'fresher05:fresher{UsvVyFSfZZWbi6wgC7dAFyFuR6jQQUhR}' | chpasswd
RUN echo 'fresher06:fresher{ssl_is_key}' | chpasswd
RUN mkdir /etc/fresher_pass
RUN echo "fresher{ssl_is_key}" > /etc/fresher_pass/fresher06
RUN chown "fresher06" "/etc/fresher_pass/fresher06"
RUN chmod 0400 /etc/fresher_pass/fresher06
RUN chmod 0750 /home/fresher05
COPY --chown=fresher06:root id_rsa.pub /home/fresher06/id_rsa.pub 
RUN cat /home/fresher06/id_rsa.pub | mkdir -p /home/fresher06/.ssh && chmod 700 /home/fresher06/.ssh && cat >>  /home/fresher06/.ssh/authorized_keys
RUN chmod 0600 /home/fresher06/.ssh/authorized_keys
RUN chown -R fresher06:root /home/fresher06/.ssh
RUN chown fresher06:root /home/fresher06/id_rsa.pub


COPY --chown=fresher05:root id_rsa /home/fresher05/id_rsa
RUN chown fresher05 /home/fresher05/id_rsa
RUN chmod 0400 /home/fresher05/id_rsa

RUN service ssh restart

CMD tail -f /dev/null