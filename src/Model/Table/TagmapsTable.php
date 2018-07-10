<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tagmaps Model
 *
 * @property \App\Model\Table\BookmarksTable|\Cake\ORM\Association\BelongsTo $Bookmarks
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\Tagmap get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tagmap newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tagmap[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tagmap|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tagmap patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tagmap[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tagmap findOrCreate($search, callable $callback = null, $options = [])
 */
class TagmapsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tagmaps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Bookmarks', [
            'foreignKey' => 'bookmark_id'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
        $validator
            ->integer('bookmark_id')
            ->allowEmpty('bookmark_id', 'create');
        $validator
            ->integer('tag_id')
            ->allowEmpty('tag_id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bookmark_id'], 'Bookmarks'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        return $rules;
    }
}
