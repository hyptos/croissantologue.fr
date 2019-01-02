<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181104212436 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, ref_id_place_id INT NOT NULL, ref_id_category_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_595AAE34A774B600 (ref_id_place_id), INDEX IDX_595AAE3447C2611A (ref_id_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grade_user (grade_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_23F19B59FE19A1A8 (grade_id), INDEX IDX_23F19B59A76ED395 (user_id), PRIMARY KEY(grade_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE34A774B600 FOREIGN KEY (ref_id_place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE3447C2611A FOREIGN KEY (ref_id_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE grade_user ADD CONSTRAINT FK_23F19B59FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE grade_user ADD CONSTRAINT FK_23F19B59A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE grade DROP FOREIGN KEY FK_595AAE34A774B600');
        $this->addSql('ALTER TABLE grade DROP FOREIGN KEY FK_595AAE3447C2611A');
        $this->addSql('ALTER TABLE grade_user DROP FOREIGN KEY FK_23F19B59FE19A1A8');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE grade_user');
    }
}
