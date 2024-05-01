#include <stdio.h>
#include <stdlib.h>



// Matriz tem que ser o drobro do valor de nós, por conta das arestas
// Estrutura base
typedef struct 
{
	int matriz[10][10];
	int numNos;
} Grafo;


void inicializarGrafo(Grafo* grafo, int numNos)
{
	int i, j;
	grafo->numNos = numNos;

	for (i = 0; i < numNos; i++) {
		for(j=0; j<numNos; j++){
			grafo->matriz[i][j] = rand() % 100;
		}
	}
}

void adicionarAresta(Grafo* grafo, int i, int j)
{
	if(
		i >= 0 && 
		i < grafo->numNos && 
		j >= 0 && 
		j < grafo->numNos) {

	 		grafo->matriz[i][j] = 1; //Contem uma aresta entre I e J

		}
}


void imprimirGrafo(Grafo* grafo)
{
	int i, j;

	//interacao
	for(i = 0; i < grafo->numNos; i++){
		printf("Adjacente do nó %d: ", i);
		for(j = 0; j < grafo->numNos; j++){
			if (grafo->matriz[i][j] == 1) {
				printf("%d: -> ", j);
			}
		}

		printf("Null \n");
	}
}


int main()
{

	int numNos = 5;
	Grafo grafo;
	inicializarGrafo(&grafo, numNos);
	adicionarAresta(&grafo, 0, 1);
	adicionarAresta(&grafo, 0, 4);
	adicionarAresta(&grafo, 1, 2);

	imprimirGrafo(&grafo);
	printf("\n\nFIM!\n");
	return 0;
}