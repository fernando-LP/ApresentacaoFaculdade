
#include <stdio.h>

#define MAX_HEAP_SIZE 100

void siftUp(int heap[], int index) {
    //implementar de acordo com os criterios
}

void siftDown(int heap[], int heapSize, int index) {
    //implementar de acordo com os criterios
}

void insertPriorityQueue(int heap[], int* heapSize, int value) {
    if (*heapSize >= MAX_HEAP_SIZE) {
        printf("A fila de prioridades está cheia. Impossível inserir.\n");
        return;
    }

    heap[*heapSize] = value;
    *heapSize = *heapSize + 1;
    //reorganizar o heap apos a insercao
}

int removeMaxPriority(int heap[], int* heapSize) {
    if (*heapSize <= 0) {
        printf("A fila de prioridades está vazia. Impossível remover.\n");
        return -1;
    }

    int maxValue = heap[0];
    heap[0] = heap[*heapSize - 1];
    *heapSize = *heapSize - 1;

    //reorganizar o heap apos a remocao

    return maxValue;
}

void printMaxPriority(int heap[], int heapSize) {
    if (heapSize <= 0) {
        printf("A fila de prioridades está vazia.\n");
        return;
    }

    printf("Elemento de maior prioridade: %d\n", heap[0]);
}


int main() {
    int priorityQueue[MAX_HEAP_SIZE];
    int queue;
    int queueSize = 0;
    int option, value;

    do {
        printf("\nEscolha uma opcao:\n");
        printf("1. Inserir um elemento na fila de prioridades\n");
        printf("2. Remover o elemento de maior prioridade\n");
        printf("3. Exibir o elemento de maior prioridade\n");
        printf("4. Sair do programa\n");
        printf("Escolha uma opcao: ");
        scanf("%d", &option);

        switch (option) {
            case 1:
                printf("Digite o valor a ser inserido: ");
                scanf("%d", &value);
                insertPriorityQueue(priorityQueue, &queueSize, value);
                printf("Elemento %d inserido na fila de prioridades.\n", value);
                break;
            case 2:
                value = removeMaxPriority(priorityQueue, &queueSize);
                if (value != -1)
                    printf("Elemento %d removido da fila de prioridades.\n", value);
                break;
            case 3:
                printMaxPriority(priorityQueue, queueSize);
                break;
            case 4:
                printf("Encerrando o programa.\n");
                break;
            default:
                printf("Opcao invalida. Tente novamente.\n");
                break;
        }
    } while (option != 5);

    return 0;
}