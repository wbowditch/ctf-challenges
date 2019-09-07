
#include <stdint.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <errno.h>
#include <string.h>
#include <sys/types.h>
#define MAX 400 
#define PORT 4995
#define SA struct sockaddr

void SwapBytes(void *pv, size_t n)
{

    char *p = pv;
    size_t lo, hi;
    for(lo=0, hi=n-1; hi>lo; lo++, hi--)
    {
        char tmp=p[lo];
        p[lo] = p[hi];
        p[hi] = tmp;
    }
}
#define SWAP(x) SwapBytes(&x, sizeof(x));

int func(int sockfd) 
{

    char buffer[MAX]; 
    int n; 
    for (;;) { 
        char dialogue1[] = "Since you're about to die anyway, I might as well tell you my secret!\n";
        char dialogue2[] = "A single password will halt my machine, but you'll never figure it out!\n\n";
        char secretPassword[] = "Secret Password: ";

        write(sockfd, dialogue1, sizeof(dialogue1)); 
        write(sockfd, dialogue2, sizeof(dialogue2)); 
        write(sockfd, secretPassword, sizeof(secretPassword));

        bzero(buffer,MAX);
        read(sockfd, buffer, sizeof(buffer)); 
        
        uint32_t *ints = (uint32_t*) buffer;
        int i;
        for (i = 0; i < 10; i= i+1) 
        {
            SWAP(ints[i]); //convert little endian to big endian to make your live easier :)
        }

        if (ints[0]  == 0x7468655F && ints[1]  == 0x756E6974 && ints[2]  == 0x65645F73 && 
            ints[3]  == 0x74617465 && ints[4]  == 0x735F696E && ints[5]  == 0x76656E74 &&
            ints[6]  == 0x65645F74 && ints[7]  == 0x68655F69 && ints[8]  == 0x6E746572 && ints[9] == 0x6E65740A)
        {
            char grr[] = "Grr, you found the password! I'll be back!\n";
            write(sockfd, grr, sizeof(grr));
        }
        else
        {
            char mwahaha[] = "Mwahaha! You fools will never stop me! How could the answer be\n";
            write(sockfd, mwahaha, sizeof(mwahaha));
            // 8 says that you want to show 8 digits
            // 0 that you want to prefix with 0's instead of just blank spaces
            // x that you want to print in lower-case hexadecimal.
            FILE *fd = fdopen(sockfd, "w");
            fprintf(fd, "<0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X 0x%08X?\n",
               ints[0], ints[1], ints[2], ints[3], ints[4], ints[5], ints[6], ints[7], ints[8], ints[9], ints[10], ints[11],
                    ints[12], ints[13], ints[14]);
            fflush(fd);
            
        }
        break;
    }

} 

// Driver function 
int main() 
{ 
    int sockfd, connfd, len; 
    struct sockaddr_in servaddr, cli; 
  
    sockfd = socket(AF_INET, SOCK_STREAM, 0); 
    if (sockfd == -1) { 
        printf("socket creation failed...\n"); 
        exit(0); 
    } 
    else
        printf("Socket successfully created..\n"); 
    bzero(&servaddr, sizeof(servaddr)); 
  
    servaddr.sin_family = AF_INET; 
    servaddr.sin_addr.s_addr = htonl(INADDR_ANY); 
    servaddr.sin_port = htons(PORT); 
  
    if ((bind(sockfd, (SA*)&servaddr, sizeof(servaddr))) != 0) { 
        printf("socket bind failed...\n"); 
        exit(0); 
    } 
    else
        printf("Socket successfully binded..\n"); 
  
    if ((listen(sockfd, 5)) != 0) { 
        printf("Listen failed...\n"); 
        exit(0); 
    } 
    else
        printf("Server listening..\n"); 
    len = sizeof(cli); 
  
    for (;;) {


        connfd = accept(sockfd, (SA*)&cli, &len); 
        if (connfd < 0) { 
            printf("server acccept failed...\n"); 
            exit(0); 
        } 
        else
            printf("server acccept the client...\n"); 
      
        func(connfd); 
        printf("Closing..\n");
      
        close(connfd);
    }
} 
