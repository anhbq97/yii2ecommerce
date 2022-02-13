<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 * - `{{%user}}`
 */
class m220212_163306_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'thumbnail' => $this->text(),
            'summary' => $this->string(255),
            'content' => $this->text(),
            'tags' => $this->string(2000),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-post-category_id}}',
            '{{%post}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-post-category_id}}',
            '{{%post}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-post-user_id}}',
            '{{%post}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-post-user_id}}',
            '{{%post}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-post-category_id}}',
            '{{%post}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-post-category_id}}',
            '{{%post}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-post-user_id}}',
            '{{%post}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-post-user_id}}',
            '{{%post}}'
        );

        $this->dropTable('{{%post}}');
    }
}
