Data segment
	msg1 db 10,13,"Enter the first number: $"
	msg2 db 10,13,"Enter the second number: $"
	msg3 db 10,13,"Result: $"
	msg4 db 10,13,"MENU: $"
	msg5 db 10,13,"1.Add $"
	msg6 db 10,13,"2.Subtract $"
	msg7 db 10,13,"Enter your choice: $"
	num1 db ?
	num2 db ?
	choice db ?
Data ends
Code segment
Assume DS:data,CS:code
start:
mov ax,data
mov ds,ax

lea dx,msg1
mov ah,09h
int 21h
call input1
mov num1,bl

lea dx,msg2
mov ah,09h
int 21h
call input1
mov num2,bl

lea dx,msg4
mov ah,09h
int 21h
lea dx,msg5
mov ah,09h
int 21h
lea dx,msg6
mov ah,09h
int 21h

lea dx,msg7
mov ah,09h
int 21h
call input1
mov choice,bl

cmp bl,05h
jnz labela
e:
mov ah,4ch
int 21h

labela:
cmp bl,01h
jnz labelb
mov cx,0000h
mov bx,0000h
mov bl,num1
mov cl,num2
add bl,cl
lea dx,msg3
mov ah,09h
int 21h
mov bx,cx
and bx,00f0h
ror bx,04
call output
mov bx,cx
and bx,000fh
call output
jmp e

labelb:
mov cx,0000h
mov bx,0000h
mov bl,num1
mov cl,num2
sub bl,cl
lea dx,msg3
mov ah,09h
int 21h
mov bx,cx
and bx,00f0h
ror bx,04
call output
mov bx,cx
and bx,000fh
call output
jmp e

input1 proc
mov ah,01h
int 21h
call input
rol ah,04h
mov bl,al
mov ah,01h
int 21h
call input
mov ah,00h
add bl,al
endp

input proc
cmp al,41h
jc label1
sub al,07h
label1:
sub al,30h
ret
endp

output proc 
cmp bl,0ah
jc label2
add bl,07h
label2:
add bl,30h
mov dx,0000h
mov dl,bl
mov ah,02h
int 21h
ret
endp


Code ends
end start