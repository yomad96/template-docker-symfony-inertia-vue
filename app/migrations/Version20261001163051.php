<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261001163051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card_edition (id BINARY(16) NOT NULL, subject_kind VARCHAR(16) NOT NULL, season_label VARCHAR(80) DEFAULT NULL, title VARCHAR(160) NOT NULL, image_path VARCHAR(255) NOT NULL, publication_status VARCHAR(20) DEFAULT \'draft\' NOT NULL, published_at DATETIME DEFAULT NULL, game_id BINARY(16) NOT NULL, rarity_id BINARY(16) NOT NULL, player_id BINARY(16) DEFAULT NULL, team_id BINARY(16) DEFAULT NULL, champion_id BINARY(16) DEFAULT NULL, game_item_id BINARY(16) DEFAULT NULL, featured_team_id BINARY(16) DEFAULT NULL, competition_id BINARY(16) DEFAULT NULL, INDEX IDX_FF8B9269E48FD905 (game_id), INDEX IDX_FF8B9269F3747573 (rarity_id), INDEX IDX_FF8B926999E6F5DF (player_id), INDEX IDX_FF8B9269296CD8AE (team_id), INDEX IDX_FF8B9269FA7FD7EB (champion_id), INDEX IDX_FF8B926987AD2D71 (game_item_id), INDEX IDX_FF8B926988ADC8E3 (featured_team_id), INDEX IDX_FF8B92697B39D312 (competition_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE card_sale (id BINARY(16) NOT NULL, visibility VARCHAR(16) NOT NULL, price INT NOT NULL, status VARCHAR(20) DEFAULT \'active\' NOT NULL, expires_at DATETIME NOT NULL, completed_at DATETIME DEFAULT NULL, seller_id BINARY(16) NOT NULL, user_card_id BINARY(16) NOT NULL, buyer_id BINARY(16) DEFAULT NULL, sale_transaction_id BINARY(16) DEFAULT NULL, INDEX IDX_978C2A78DE820D9 (seller_id), INDEX IDX_978C2A712C1842A (user_card_id), INDEX IDX_978C2A76C755722 (buyer_id), INDEX IDX_978C2A788866AE8 (sale_transaction_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE card_set (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(160) NOT NULL, theme VARCHAR(160) NOT NULL, period_label VARCHAR(80) DEFAULT NULL, publication_status VARCHAR(20) DEFAULT \'draft\' NOT NULL, game_id BINARY(16) NOT NULL, INDEX IDX_B6E4A11DE48FD905 (game_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE card_set_card (id BINARY(16) NOT NULL, position INT DEFAULT NULL, card_set_id BINARY(16) NOT NULL, card_edition_id BINARY(16) NOT NULL, INDEX IDX_3AE2B4D962C45E6C (card_set_id), INDEX IDX_3AE2B4D9185A8750 (card_edition_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE champion (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(120) NOT NULL, game_id BINARY(16) NOT NULL, INDEX IDX_45437EB4E48FD905 (game_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE competition (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(120) NOT NULL, region VARCHAR(80) DEFAULT NULL, game_id BINARY(16) NOT NULL, INDEX IDX_B50A2CB1E48FD905 (game_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE currency_transaction (id BINARY(16) NOT NULL, kind VARCHAR(32) NOT NULL, amount INT NOT NULL, balance_after INT NOT NULL, source_type VARCHAR(48) DEFAULT NULL, source_id BINARY(16) DEFAULT NULL, created_at DATETIME NOT NULL, wallet_id BINARY(16) NOT NULL, INDEX IDX_C3DF0B70712520F3 (wallet_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE daily_pack_claim (id BINARY(16) NOT NULL, claimed_at DATETIME NOT NULL, next_available_at DATETIME NOT NULL, user_id BINARY(16) NOT NULL, pack_opening_id BINARY(16) NOT NULL, INDEX IDX_E87EA935A76ED395 (user_id), UNIQUE INDEX UNIQ_E87EA9356427A109 (pack_opening_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE friendship (id BINARY(16) NOT NULL, status VARCHAR(20) DEFAULT \'pending\' NOT NULL, responded_at DATETIME DEFAULT NULL, requester_id BINARY(16) NOT NULL, addressee_id BINARY(16) NOT NULL, INDEX IDX_7234A45FED442CF4 (requester_id), INDEX IDX_7234A45F2261B4C3 (addressee_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE game (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(120) NOT NULL, is_active TINYINT DEFAULT 1 NOT NULL, UNIQUE INDEX UNIQ_232B318C989D9B62 (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE game_item (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(120) NOT NULL, game_id BINARY(16) NOT NULL, INDEX IDX_F40E4932E48FD905 (game_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE organization (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(120) NOT NULL, logo_path VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C1EE637C989D9B62 (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pack_definition (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(120) NOT NULL, cards_per_open INT NOT NULL, publication_status VARCHAR(20) DEFAULT \'draft\' NOT NULL, game_id BINARY(16) NOT NULL, UNIQUE INDEX UNIQ_4A58A7CE989D9B62 (slug), INDEX IDX_4A58A7CEE48FD905 (game_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pack_opening (id BINARY(16) NOT NULL, source VARCHAR(32) NOT NULL, opened_at DATETIME NOT NULL, rule_snapshot JSON NOT NULL, user_id BINARY(16) NOT NULL, pack_definition_id BINARY(16) NOT NULL, INDEX IDX_357C44BEA76ED395 (user_id), INDEX IDX_357C44BE79868DD8 (pack_definition_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pack_opening_result (id BINARY(16) NOT NULL, result_kind VARCHAR(16) NOT NULL, currency_amount INT DEFAULT NULL, created_at DATETIME NOT NULL, pack_opening_id BINARY(16) NOT NULL, card_edition_id BINARY(16) NOT NULL, user_card_id BINARY(16) DEFAULT NULL, INDEX IDX_F50D5F4A6427A109 (pack_opening_id), INDEX IDX_F50D5F4A185A8750 (card_edition_id), INDEX IDX_F50D5F4A12C1842A (user_card_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pack_slot (id BINARY(16) NOT NULL, position INT NOT NULL, rarity_weights JSON NOT NULL, pack_definition_id BINARY(16) NOT NULL, minimum_rarity_id BINARY(16) DEFAULT NULL, INDEX IDX_E58F79DE79868DD8 (pack_definition_id), INDEX IDX_E58F79DEF25C80E4 (minimum_rarity_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE player (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, display_name VARCHAR(120) NOT NULL, country_code VARCHAR(2) DEFAULT NULL, UNIQUE INDEX UNIQ_98197A65989D9B62 (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE player_team_membership (id BINARY(16) NOT NULL, joined_on DATE NOT NULL, left_on DATE DEFAULT NULL, role VARCHAR(60) DEFAULT NULL, player_id BINARY(16) NOT NULL, team_id BINARY(16) NOT NULL, INDEX IDX_613C230B99E6F5DF (player_id), INDEX IDX_613C230B296CD8AE (team_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE rarity (id BINARY(16) NOT NULL, slug VARCHAR(40) NOT NULL, label VARCHAR(80) NOT NULL, display_order INT NOT NULL, duplicate_currency_value INT NOT NULL, is_active TINYINT DEFAULT 1 NOT NULL, UNIQUE INDEX UNIQ_B7C0BE46989D9B62 (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE team (id BINARY(16) NOT NULL, slug VARCHAR(80) NOT NULL, name VARCHAR(120) NOT NULL, is_active TINYINT DEFAULT 1 NOT NULL, game_id BINARY(16) NOT NULL, organization_id BINARY(16) DEFAULT NULL, INDEX IDX_C4E0A61FE48FD905 (game_id), INDEX IDX_C4E0A61F32C8A3DE (organization_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `user` (id BINARY(16) NOT NULL, email VARCHAR(180) NOT NULL, username VARCHAR(64) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, avatar_path VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user_card (id BINARY(16) NOT NULL, acquired_at DATETIME NOT NULL, state VARCHAR(20) DEFAULT \'owned\' NOT NULL, owner_id BINARY(16) NOT NULL, card_edition_id BINARY(16) NOT NULL, INDEX IDX_6C95D41A7E3C61F9 (owner_id), INDEX IDX_6C95D41A185A8750 (card_edition_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE wallet (id BINARY(16) NOT NULL, balance INT DEFAULT 0 NOT NULL, updated_at DATETIME NOT NULL, user_id BINARY(16) NOT NULL, UNIQUE INDEX UNIQ_7C68921FA76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B9269E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B9269F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B926999E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B9269296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B9269FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B926987AD2D71 FOREIGN KEY (game_item_id) REFERENCES game_item (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B926988ADC8E3 FOREIGN KEY (featured_team_id) REFERENCES team (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_edition ADD CONSTRAINT FK_FF8B92697B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_sale ADD CONSTRAINT FK_978C2A78DE820D9 FOREIGN KEY (seller_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_sale ADD CONSTRAINT FK_978C2A712C1842A FOREIGN KEY (user_card_id) REFERENCES user_card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_sale ADD CONSTRAINT FK_978C2A76C755722 FOREIGN KEY (buyer_id) REFERENCES `user` (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_sale ADD CONSTRAINT FK_978C2A788866AE8 FOREIGN KEY (sale_transaction_id) REFERENCES currency_transaction (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE card_set ADD CONSTRAINT FK_B6E4A11DE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_set_card ADD CONSTRAINT FK_3AE2B4D962C45E6C FOREIGN KEY (card_set_id) REFERENCES card_set (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_set_card ADD CONSTRAINT FK_3AE2B4D9185A8750 FOREIGN KEY (card_edition_id) REFERENCES card_edition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB4E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE currency_transaction ADD CONSTRAINT FK_C3DF0B70712520F3 FOREIGN KEY (wallet_id) REFERENCES wallet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE daily_pack_claim ADD CONSTRAINT FK_E87EA935A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE daily_pack_claim ADD CONSTRAINT FK_E87EA9356427A109 FOREIGN KEY (pack_opening_id) REFERENCES pack_opening (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE friendship ADD CONSTRAINT FK_7234A45FED442CF4 FOREIGN KEY (requester_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE friendship ADD CONSTRAINT FK_7234A45F2261B4C3 FOREIGN KEY (addressee_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_item ADD CONSTRAINT FK_F40E4932E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pack_definition ADD CONSTRAINT FK_4A58A7CEE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pack_opening ADD CONSTRAINT FK_357C44BEA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pack_opening ADD CONSTRAINT FK_357C44BE79868DD8 FOREIGN KEY (pack_definition_id) REFERENCES pack_definition (id)');
        $this->addSql('ALTER TABLE pack_opening_result ADD CONSTRAINT FK_F50D5F4A6427A109 FOREIGN KEY (pack_opening_id) REFERENCES pack_opening (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pack_opening_result ADD CONSTRAINT FK_F50D5F4A185A8750 FOREIGN KEY (card_edition_id) REFERENCES card_edition (id)');
        $this->addSql('ALTER TABLE pack_opening_result ADD CONSTRAINT FK_F50D5F4A12C1842A FOREIGN KEY (user_card_id) REFERENCES user_card (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE pack_slot ADD CONSTRAINT FK_E58F79DE79868DD8 FOREIGN KEY (pack_definition_id) REFERENCES pack_definition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pack_slot ADD CONSTRAINT FK_E58F79DEF25C80E4 FOREIGN KEY (minimum_rarity_id) REFERENCES rarity (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE player_team_membership ADD CONSTRAINT FK_613C230B99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_team_membership ADD CONSTRAINT FK_613C230B296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F32C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE user_card ADD CONSTRAINT FK_6C95D41A7E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_card ADD CONSTRAINT FK_6C95D41A185A8750 FOREIGN KEY (card_edition_id) REFERENCES card_edition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B9269E48FD905');
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B9269F3747573');
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B926999E6F5DF');
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B9269296CD8AE');
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B9269FA7FD7EB');
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B926987AD2D71');
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B926988ADC8E3');
        $this->addSql('ALTER TABLE card_edition DROP FOREIGN KEY FK_FF8B92697B39D312');
        $this->addSql('ALTER TABLE card_sale DROP FOREIGN KEY FK_978C2A78DE820D9');
        $this->addSql('ALTER TABLE card_sale DROP FOREIGN KEY FK_978C2A712C1842A');
        $this->addSql('ALTER TABLE card_sale DROP FOREIGN KEY FK_978C2A76C755722');
        $this->addSql('ALTER TABLE card_sale DROP FOREIGN KEY FK_978C2A788866AE8');
        $this->addSql('ALTER TABLE card_set DROP FOREIGN KEY FK_B6E4A11DE48FD905');
        $this->addSql('ALTER TABLE card_set_card DROP FOREIGN KEY FK_3AE2B4D962C45E6C');
        $this->addSql('ALTER TABLE card_set_card DROP FOREIGN KEY FK_3AE2B4D9185A8750');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB4E48FD905');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1E48FD905');
        $this->addSql('ALTER TABLE currency_transaction DROP FOREIGN KEY FK_C3DF0B70712520F3');
        $this->addSql('ALTER TABLE daily_pack_claim DROP FOREIGN KEY FK_E87EA935A76ED395');
        $this->addSql('ALTER TABLE daily_pack_claim DROP FOREIGN KEY FK_E87EA9356427A109');
        $this->addSql('ALTER TABLE friendship DROP FOREIGN KEY FK_7234A45FED442CF4');
        $this->addSql('ALTER TABLE friendship DROP FOREIGN KEY FK_7234A45F2261B4C3');
        $this->addSql('ALTER TABLE game_item DROP FOREIGN KEY FK_F40E4932E48FD905');
        $this->addSql('ALTER TABLE pack_definition DROP FOREIGN KEY FK_4A58A7CEE48FD905');
        $this->addSql('ALTER TABLE pack_opening DROP FOREIGN KEY FK_357C44BEA76ED395');
        $this->addSql('ALTER TABLE pack_opening DROP FOREIGN KEY FK_357C44BE79868DD8');
        $this->addSql('ALTER TABLE pack_opening_result DROP FOREIGN KEY FK_F50D5F4A6427A109');
        $this->addSql('ALTER TABLE pack_opening_result DROP FOREIGN KEY FK_F50D5F4A185A8750');
        $this->addSql('ALTER TABLE pack_opening_result DROP FOREIGN KEY FK_F50D5F4A12C1842A');
        $this->addSql('ALTER TABLE pack_slot DROP FOREIGN KEY FK_E58F79DE79868DD8');
        $this->addSql('ALTER TABLE pack_slot DROP FOREIGN KEY FK_E58F79DEF25C80E4');
        $this->addSql('ALTER TABLE player_team_membership DROP FOREIGN KEY FK_613C230B99E6F5DF');
        $this->addSql('ALTER TABLE player_team_membership DROP FOREIGN KEY FK_613C230B296CD8AE');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FE48FD905');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F32C8A3DE');
        $this->addSql('ALTER TABLE user_card DROP FOREIGN KEY FK_6C95D41A7E3C61F9');
        $this->addSql('ALTER TABLE user_card DROP FOREIGN KEY FK_6C95D41A185A8750');
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921FA76ED395');
        $this->addSql('DROP TABLE card_edition');
        $this->addSql('DROP TABLE card_sale');
        $this->addSql('DROP TABLE card_set');
        $this->addSql('DROP TABLE card_set_card');
        $this->addSql('DROP TABLE champion');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE currency_transaction');
        $this->addSql('DROP TABLE daily_pack_claim');
        $this->addSql('DROP TABLE friendship');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_item');
        $this->addSql('DROP TABLE organization');
        $this->addSql('DROP TABLE pack_definition');
        $this->addSql('DROP TABLE pack_opening');
        $this->addSql('DROP TABLE pack_opening_result');
        $this->addSql('DROP TABLE pack_slot');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE player_team_membership');
        $this->addSql('DROP TABLE rarity');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_card');
        $this->addSql('DROP TABLE wallet');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
