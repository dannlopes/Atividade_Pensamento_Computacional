# Desafios Técnicos e Soluções Propostas
## Projeto: Plataforma Acadêmica Inteligente (PAI)

Este documento descreve os principais desafios de engenharia identificados durante a concepção do sistema e as estratégias adotadas para garantir a estabilidade e segurança em larga escala.

---

### 1. Escalabilidade e Disponibilidade
**O Desafio:** No final de cada semestre, o volume de acessos simultâneos para consulta de notas e materiais aumenta em mais de 1.000%. Um servidor comum não suportaria essa carga.

**Soluções Propostas:**
* **Balanceamento de Carga (Load Balancing):** Distribuição das requisições entre múltiplos servidores para evitar sobrecarga em um único ponto.
* **Cache de Dados (Redis):** Armazenamento temporário das consultas mais frequentes (como o boletim do aluno) em memória, reduzindo a carga no banco de dados MySQL.
* **Escalabilidade Horizontal:** Arquitetura preparada para adicionar novos nós de processamento automaticamente conforme a demanda aumenta.

---

### 2. Segurança da Informação
Seguindo os princípios de **Saltzer & Schroeder**, o sistema foi desenhado para ser resiliente a falhas de segurança.

**Desafios e Aplicações:**
* **Privilégio Mínimo (Least Privilege):** Cada perfil (Aluno, Professor, Admin) possui apenas as permissões estritamente necessárias. Um professor não pode alterar dados financeiros, e um aluno não pode alterar notas de terceiros.
* **Padrão de Falha Segura (Fail-Safe Defaults):** Caso o sistema de autenticação sofra uma queda ou erro, o acesso é negado por padrão até que a identidade seja validada com segurança.
* **Mediação Completa:** Todas as requisições às APIs passam por uma camada de validação de token (JWT), garantindo que nenhum acesso "pule" a verificação de segurança.

---

### 3. Integridade e Consistência de Dados
**O Desafio:** Garantir que, em um sistema com muitos acessos, a nota lançada por um professor seja refletida corretamente e sem erros de concorrência no banco de dados.

**Soluções Propostas:**
* **Transações de Banco de Dados (ACID):** Uso de transações no MySQL para garantir que uma operação de escrita ou seja concluída totalmente ou revertida em caso de erro, evitando dados corrompidos.
* **Logs de Auditoria:** Registro detalhado de todas as alterações em registros sensíveis (quem alterou a nota, quando e de qual IP).

---

### 4. Integração com APIs Externas
**O Desafio:** O sistema precisa se comunicar com bibliotecas digitais e provedores de autenticação externa (como Google/Microsoft Acadêmico).

**Solução:**
* **Camada de Adaptadores (Adapter Pattern):** Criação de uma camada que isola o código principal do sistema das particularidades de cada API externa, facilitando a troca de fornecedores sem afetar o núcleo do projeto.

---
**Data:** 29/04/2026  
**Status:** Planejamento Finalizado
