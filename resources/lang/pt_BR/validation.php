<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted' => ':attribute deve ser aceito.',
    'active_url' => ':attribute não é um URL válido.',
    'after' => ':attribute deve ser uma data após :date.',
    'after_or_equal' => ':attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => ':attribute deve conter apenas letras.',
    'alpha_dash' => ':attribute deve conter apenas letras, números, travessões e sublinhados.',
    'alpha_num' => ':attribute deve conter apenas letras e números.',
    'array' => ':attribute deve ser um array.',
    'before' => ':attribute deve ser uma data antes de :date.',
    'before_or_equal' => ':attribute deve ser uma data anterior ou igual a :date.',
    'entre' => [
        'numeric' => ':attribute deve estar entre :min e :max.',
        'file' => ':attribute deve estar entre :min e :max kilobytes.',
        'string' => ':attribute deve ter entre :min e :max caracteres.',
        'array' => ':attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => ':attribute confirmação do atributo não corresponde.',
    'date' => ':attribute não é uma data válida.',
    'date_equals' => ':attribute deve ser uma data igual a :date.',
    'date_format' => ':attribute não corresponde ao formato: format.',
    'different' => ':attribute e :other devem ser diferentes.',
    'digits' => ':attribute deve ser: digits digits.',
    'digits_between' => ':attribute deve estar entre :min e :max dígitos.',
    'dimensions' => ':attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute tem um valor duplicado.',
    'email' => ':attribute deve ser um endereço de e-mail válido.',
    'ends_with' => ':attribute deve terminar com um dos seguintes: :values.',
    'exists' => 'O atributo selecionado é inválido.',
    'file' => ':attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => ':attribute deve ser maior que :value.',
        'file' => ':attribute deve ser maior que :value kilobytes.',
        'string' => ':attribute deve ser maior que: caracteres de valor.',
        'array' => ':attribute deve ter mais do que :value itens.',
    ],
    'gte' => [
        'numeric' => ':attribute deve ser maior ou igual a :value.',
        'file' => ':attribute deve ser maior ou igual :value kilobytes.',
        'string' => ':attribute deve ser maior ou igual a caracteres de valor.',
        'array' => ':attribute deve ter :value itens ou mais.',
    ],
    'image' => ':attribute deve ser uma imagem.',
    'in' => 'O atributo selecionado é inválido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => ':attribute deve ser um inteiro.',
    'ip' => ':attribute deve ser um endereço IP válido.',
    'ipv4' => ':attribute deve ser um endereço IPv4 válido.',
    'ipv6' => ':attribute deve ser um endereço IPv6 válido.',
    'json' => ':attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => ':attribute deve ser menor que :value.',
        'file' => ':attribute deve ser menor que :value kilobytes.',
        'string' => ':attribute deve ter menos que: caracteres de valor.',
        'array' => ':attribute deve ter menos que :value itens.',
    ],
    'lte' => [
        'numeric' => ':attribute deve ser menor ou igual a :value.',
        'file' => ':attribute deve ser menor ou igual :value kilobytes.',
        'string' => ':attribute deve ser menor ou igual a caracteres de valor.',
        'array' => ':attribute não deve ter mais do que :value itens.',
    ],
    'max' => [
        'numeric' => ' :attribute não deve ser maior que :max.',
        'file' => ' :attribute não deve ser maior que :max kilobytes.',
        'string' => ' :attribute não deve ser maior que :max caracteres.',
        'array' => ' :attribute não deve ter mais do que :max itens.',
    ],
    'mimes' => ' :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => ' :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => ' :attribute deve ser pelo menos :min.',
        'file' => ' :attribute deve ter pelo menos :min kilobytes.',
        'string' => ' :attribute deve ter pelo menos :min caracteres.',
        'array' => ' :attribute deve ter pelo menos: itens min.',
    ],
    'multiple_of' => ':attribute deve ser um múltiplo de :value.',
    'not_in' => 'O atributo selecionado é inválido.',
    'not_regex' => 'O formato de :attribute é inválido.',
    'numeric' => ':attribute deve ser um número.',
    'password' => 'A senha está incorreta.',
    'present' => 'O campo :attribute deve estar presente.',
    'regex' => 'O formato de :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando',
    'required_unless' => 'O campo :attribute é obrigatório, a menos que :other esteja em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values ​​estiver presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando: os valores estão presentes.',
    'required_without' => 'O campo :attribute é obrigatório quando: os valores não estão presentes.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos valores: está presente.',
    'prohibited' => 'O campo :attribute é proibido.',
    'prohibited_if' => 'O campo :attribute é proibido quando :other for: value.',
    'prohibited_unless' => 'O campo :attribute é proibido, a menos que :other esteja em :values.',
    'same' => ':attribute e :other devem corresponder.',
    'size' => [
        'numeric' => ':attribute deve ser: size.',
        'file' => ':attribute deve ter: size kilobytes.',
        'string' => ':attribute deve ter: caracteres de tamanho.',
        'array' => ':attribute deve conter: itens de tamanho.',
    ],
    'starts_with' => ':attribute deve começar com um dos seguintes: :values.',
    'string' => ':attribute deve ser uma string.',
    'timezone' => ':attribute deve ser uma zona válida.',
    'unique' => ':attribute já foi usado.',
    'uploaded' => ':attribute falhou ao carregar.',
    'url' => 'O formato de :attribute é inválido.',
    'uuid' => ':attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'email' => [
            'required' => 'Você deve informar um endereço de e-mail.',
            'unique' => 'O e-mail informado já está cadastrado.'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'title' => 'título',
        'content' => 'conteúdo',
        'image' => 'imagem',
        'description' => 'descrição',
        'name' => 'nome',
        'birthdate' => 'data de nascimento',
        'month' => 'mês',
        'gender' => 'sexo',
        'phone' => 'telefone',
        'phone_mobile' => 'celular',
        'mothers_name' => 'nome da mãe',
        'fathers_name' => 'nome do pai',
        'address' => 'endereço',
        'address_number' => 'número',
        'number' => 'número',
        'complements' => 'complemento',
        'district' => 'bairro',
        'state' => 'estado',
        'city' => 'cidade',
        'state_id' => 'estado',
        'city_id' => 'cidade',
        'message' => 'messagem',
        'date_init' => 'data de início',
        'date_finish' => 'data final',
        'password' => 'senha',
        'cnpj' => 'cnpj',
        'birth_date' => 'data de nascimento',
        'day' => 'dia',
        'hour_init' => 'hora inícial',
        'hour_finish' => 'hora final',
        'crm' => 'CRM',
        'week' => 'semana',
        'hour' => 'hora',
        'date_birth' => 'data de nascimento',
        'level' => 'nível',
        'county_id' => 'municípios',
        'role_id' => 'grupo',
        'duration_start' => 'data inicial duração',
        'duration_end' => 'data final duração',
        'period' => 'período',
        'date_distribution' => 'data de distribuição',
        'date_status' => 'data do status',
        'passive_pole_parties' => 'partes polo passivo',
        'notification_period' => 'período de notificação',
        'date' => 'data',
        'due_date' => 'date de vencimento',
        'amounts' => 'quantidade',
        'type' => 'tipo',
        'formation' => 'formação',
        'full_name' => 'nome completo',
        'value' => 'valor',
        'type_payment' => 'tipo de pagamento',
        'date_payment' => 'data de pagamento',
        'start_date' => 'data de início',
        'finish_date' => 'data final',
        'details' => 'detalhes',
        'document' => 'documento',
        'telephone' => 'telefone',
        'shop_id' => 'loja',
        'VISITOR_id' => 'representante',
        'picture_profile' => 'foto de perfil',
        'company_id' => 'empresa',
        'product_topic' => 'produto',
        'date_acquisition' => 'data de aquisição',
        'description_experience_product' => 'sua experiência com o produto ou serviço',
        'product_topic_id' => 'produto'
    ],
];
