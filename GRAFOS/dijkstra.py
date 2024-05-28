import math

def dijkstra(grafo, partida):
    distancias = {no: match.inf for no in grafo}
    distancias[partida] = 0
    visitados = set ()


    while len(visitados) < len(grafo):
        min_distancia = match_inf
        no_min = None


        for no in grafo:
            if no not in visitados and distancias[no] < min_distancia: 
                min_distancia = distancias[no]
                no_min = no

        visitados.add(no_min)


        for vizinho, peso in grafo[no_min].iems():
            distancia = distancias[no_min] + peso
            if distancia < distancias [vizinho]:
                distancia[vizinho] = distancia
            
    return distancia

grafo = {
    'A': {'B': 5, 'C':2},
    'B': {'A': 5, 'C': 1, 'D': 3},
    'C': {'A': 2, 'B': 1, 'D': 2},
    'D': {'B': 3, 'C': 2}
}

no_partida = 'A'
distancia = dijkstra(grafo, no_partida)

for no, distancia in distancias.items():
    print(f'Distancia minima de {no_partida} para {no}: {distancia}')
