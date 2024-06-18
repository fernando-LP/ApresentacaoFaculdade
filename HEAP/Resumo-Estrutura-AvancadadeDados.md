# Estrutura avançada de Dados
> Resumo Final

## Ponteiros 
* Variavel capaz de armazenar um endereço da memória ou o endereço de outra variavel.

## Pilhas
Pilhas são estruturas de dados onde todas as operações de inserção e remoção são realizadas na mesma extremidade, chamada TOPO. Seguem o princípio LIFO (Last In, First Out), onde o último elemento a entrar é o primeiro a sair.

### Para que Servem?
Pilhas são úteis para:
- Análise de expressões e sintaxe.
- Conversão de formatos de expressões.

#### Algumas funções em C++
* `empty()`: Verifica se a pilha está vazia.
* `size()`: Retorna o número de elementos na pilha.
* `top()`: Retorna o elemento no topo da pilha.
* `push()`: Adiciona um elemento ao topo da pilha.
* `pop()`: Remove o elemento no topo da pilha.



## Filas
* Tipo de lista de dados onde o primeiro objeto a ser inserido é o primeiro a ser removido, normalmente conhecido como FIFO, primeiro a entrar primeiro a sair.
Exemplo: ```[1][2][3][4][5][6][7][n+1]```
* Muito utilizado para gerenciar processos
> Por exemplo em redes de computadores, ele e utilizado para priorizar pacotes em fila.

## Structs
* É um conjunto de dados logicos relacionados, mas de varios tipos (int,float,char,etc);
* É como se uma variavel tivesse ouras variaveis dentro dela.
  
Exemplo em c++:
```cpp
typedef struct ficha {
  char nome[30]
  chat endereco[40];
  int idade;
  float salario;
}
```
## Listas Encadeadas

* Para cada elemento inserido alocamos um espaço na memoria;
* A quantidade de memoria armazenada é equivalente a elementos inseridos.
* Para conseguir percorer os elementos da lista, é necessário para cada elemento inserido ele tenha o valor encadeado junto, um poteiro para o próximo elemento da lista;
* A partir do primeiro elemento podemos chegar nos demais
* O ultimo elemento da lista aponta para NULL

Exemplo de Lista Encadeada:
1. Inicialização
2. Inserção de elementos
3. Listagem
4. Verificar se a lista está vazia
5. Busca de um elemento na lista
6. Remoção de um elemento da lista
7. Liberar a Lista

Exemplo: 
``` [info1|ponteiro->] ->  [info2| ponteiro->] -> [info3| ponteiro->] ```

Problemas da Lista encadeada
1. Se precisar remover um elemento dentro o no final da lista, é preciso percorer todos até chegar no valor.
2. Não é possivel percorer os elementos em ordem inversa

Como resolver?
(Listas Duplamente ecadeadas)

## Lista Duplamente Encadeadas
* Maior diferença é que nela o elemento pode apontar para o proximo elemento e para anterior

Exemplo de Memoria: 
``` [<-ponteiro|info1|ponteiro->]  [<-ponteiro|info2|ponteiro->] [<-ponteiro|info3|ponteiro->] ```

Exemplo de Lista duplamente encadeadas
1. Inicialização
2. Inserção de elementos
3. Listagem
4. Verificar se lista está vazia
5. Busca de um elemento na lista
6. Remoção de um elemento da lista
7. Liberar a lista

## Árvores Binarias
* Árvore é uma estrutura de dado adequado para representar hierarquias
* Forma mais natural de definir uma estrutura de árvore é usando recursividade
### Definição
* Root/Raiz: Nó principal da arvore, atravéz dele que contém zero ou mais sub-árvores
* Sub-Árvore: São nós filhos ao nó raiz
* Nós Internos: São nós que estão conectados a filhos, e esses filhos estão conectados ao nó raiz/root
* Externos/Folhas: Nós que não tem filhos, normalmente são os ultimos da árvore, por isso são chamados de folhas ou externos
```bash
    1
   / \
  2   3
 / \
4   5
```
Neste exemplo:
- O nó 1 é a raiz da árvore.
- O nó 2 é filho esquerdo de 1.
- O nó 3 é filho direito de 1 e uma folha.
- O nó 4 é filho esquerdo de 2 e uma folha.
- O nó 5 é filho direito de 2 e uma folha.




