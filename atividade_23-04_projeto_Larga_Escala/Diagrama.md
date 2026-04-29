# Diagrama de Arquitetura do Sistema (PAI)

Abaixo está a representação visual da estrutura de classes e relacionamentos do sistema, utilizando a sintaxe Mermaid para renderização automática no GitHub.

```mermaid
classDiagram
    class Usuario {
        +int id
        +string nome
        +string email
        +login()
        +logout()
    }

    class Aluno {
        +string matricula
        +float mediaGeral
        +consultarNotas()
        +verSugestoesIA()
    }

    class Professor {
        +string funcional
        +string departamento
        +lancarNota(aluno, disciplina, valor)
        +registrarFrequencia()
    }

    class Disciplina {
        +int id
        +string nome
        +int cargaHoraria
        +list notas
    }

    class MotorIA {
        +analisarDesempenho(aluno)
        +gerarRecomendacao(aluno)
    }

    Usuario <|-- Aluno : Herança
    Usuario <|-- Professor : Herança
    Professor "1" --> "n" Disciplina : Leciona
    Aluno "n" --> "n" Disciplina : Matriculado
    MotorIA ..> Aluno : Processa Dados
    MotorIA ..> Disciplina : Analisa Requisitos
