#include <stdio.h>
#include <stdbool.h>
#define MAXNODES 50


//Estrutura do projeto
struct node
{
	// Informacao associada a cada nocd

};

struct arc
{
	bool adj;
	int weight;
};

//Estrutura do grafo
struct graph
{
	struct node nodes[MAXNODES];
	struct arc arcs[MAXNODES][MAXNODES];
};

//Alias para o graph
struct graph g;

//Estrutura join bidirecional (nesse momento)
void join(struct graph *g, int node1, int node2)
{
	g->arcs[node1][node2].adj = true; //aponta poteiro para o arco do node1 e 2 e informar que sao adjacentes 
}

//informa peso
void joinwt(struct graph *g, int node1, int node2, int wt)
{
	g->arcs[node1][node2].adj = true;
	g->arcs[node1][node2].weight = wt;
}


void remv(struct graph *g, int node1, int node2)
{
	g->arcs[node1][node2].adj = false;
}

bool adjacent(struct graph *g, int node1, int node2)
{
	return g->arcs[node1][node2].adj;
}

void rmvwt(struct graph *g, int node1, int node2)
{
	//passar como false a adjcacencia
	g->arcs[node1][node2].weight = false;

}

int main () 
{

	join(&g, 0, 1);
	join(&g, 1, 2);
	join(&g, 2, 3);

	printf("O nó 0 é adjacentes ao nó 1 %s\n", adjacent(&g, 0, 1) ? "SIM" : "NÃO");
	printf("O nó 1 é adjacentes ao nó 2 %s\n", adjacent(&g, 1, 2) ? "SIM" : "NÃO");
	printf("O nó 2 é adjacentes ao nó 3 %s\n", adjacent(&g, 2, 3) ? "SIM" : "NÃO");

	//removo adj
	remv(&g, 1, 2);
	printf("\n\nREMOVIDO 1 e 2\n");
	printf("O nó 0 é adjacentes ao nó 1 %s\n", adjacent(&g, 0, 1) ? "SIM" : "NÃO");
	printf("O nó 1 é adjacentes ao nó 2 %s\n", adjacent(&g, 1, 2) ? "SIM" : "NÃO");
	printf("O nó 2 é adjacentes ao nó 3 %s\n", adjacent(&g, 2, 3) ? "SIM" : "NÃO");

	//remove peso da adj
	rmvwt(&g, 2, 3);
	printf("\n\n DELL PESO 2 e 3\n");
	printf("O nó 0 é adjacentes ao nó 1 %s\n", adjacent(&g, 0, 1) ? "SIM" : "NÃO");
	printf("O nó 1 é adjacentes ao nó 2 %s\n", adjacent(&g, 1, 2) ? "SIM" : "NÃO");
	printf("O nó 2 é adjacentes ao nó 3 %s\n", adjacent(&g, 2, 3) ? "SIM" : "NÃO");

	return 0;

}
