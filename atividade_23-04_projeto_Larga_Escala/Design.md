# Design do Projeto: Sistema de Gestão Acadêmica (PAI)
## Detalhamento de Pensamento Computacional e Engenharia de Software

Este documento detalha a aplicação dos pilares do pensamento computacional na concepção da arquitetura da **Plataforma Acadêmica Inteligente**.

---

### 1. Decomposição (Breaking Down)
Para gerenciar a complexidade de um sistema de larga escala, o projeto foi decomposto em subproblemas menores e independentes:

* **Subsistema de Identidade (Auth):** Responsável estritamente por autenticação, autorização e gerenciamento de perfis (Aluno, Professor, Coordenador).
* **Subsistema Acadêmico:** Gerencia o ciclo de vida das disciplinas, lançamentos de notas e controle de frequência.
* **Subsistema de Notificações:** Gerencia o envio de alertas via e-mail e push sobre prazos e comunicados.
* **Motor de Inteligência Artificial:** Um serviço isolado que consome dados de desempenho para gerar sugestões de estudo personalizadas.

---

### 2. Reconhecimento de Padrões (Pattern Recognition)
Identificamos estruturas recorrentes para otimizar o desenvolvimento e a manutenção:

* **Padrão de Interface (UI/UX):** Uso de componentes padronizados para tabelas de notas e formulários de cadastro, garantindo consistência visual (similar ao padrão Bootstrap/Material Design).
* **Padrão de Persistência:** Implementação do padrão *Repository* para isolar a lógica de negócio do acesso ao banco de dados MySQL, facilitando testes unitários.
* **Padrão de API:** Adoção do padrão RESTful para todas as comunicações entre o front-end e o back-end.

---

### 3. Abstração (Abstraction)
Focamos no que é essencial para o funcionamento lógico, ocultando detalhes de implementação técnica:

* **Entidade "Usuário":** No nível de design, tratamos apenas as propriedades comuns (ID, Nome, Credenciais), sem nos preocupar se o armazenamento final será em disco local ou na nuvem.
* **Cálculo de Médias:** Criamos uma interface lógica que recebe notas e retorna a situação (Aprovado/Reprovado), independente da fórmula específica de cada disciplina, permitindo que a regra mude sem afetar o restante do sistema.

---

### 4. Algoritmos e Fluxogramas
O fluxo principal do sistema segue a lógica de processamento sistemático:

#### Algoritmo de Lançamento de Nota (Pseudocódigo):
```text
Se (Professor logado E disciplina vinculada) Então:
    Recebe nota_aluno
    Valida nota (entre 0 e 10)
    Grava no banco de dados
    Dispara gatilho para Recalcular_Media(aluno_id)
Senão:
    Retorna erro: "Permissão insuficiente"
FimSe
```
### 5. Diagramas de Design
Nesta etapa, utilizamos a UML (Unified Modeling Language) para representar a estrutura:

* **Diagrama de Casos de Uso:** Para mapear as interações dos alunos e professores com o sistema.
* **Diagrama de Classes:** Para definir a relação entre Alunos, Turmas e Notas.

---
### 📅 Data de atualização: 29/04/2026   
**Autor:** Daniel Lopes Aguiar
