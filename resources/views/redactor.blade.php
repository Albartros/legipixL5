@extends('layout.layout')

@section('title', 'Redactor')

@section('content')
    <div class="editor">
        <div class="editor__info">
            <div class="editor__header">
                <h3 class="editor__header__title">Nouveau sujet
                    <small>sur le forum</small>
                </h3>
                <p class="editor__header__description">Remplissez les champs demandés :</p>
            </div>
            <div class="editor__main">
                <label for="title" class="form__largeLabel">Titre du sujet :</label>
                <input placeholder="Attention, vous ne pourrez plus le changer" id="title" name="title" type="text"
                       class="form__largeInput">

                <label for="mainTag" class="form__largeLabel">Tag principal :</label>
                <select class="editor__header__select editor__header__select--smallAfter" name="mainTag" id="mainTag">
                    <option value="1">Gaming</option>
                    <option value="2">News</option>
                </select>
                <br>
                <label for="title" class="form__largeLabel form__largeLabel--withSmall">Tags secondaires
                    :<br>
                    <small>Séparés par des #</small>
                </label>
                <input placeholder="ex : #Tag1#Tag2" id="title" name="title" type="text"
                       class="form__largeInput">
                <button type="submit" class="button form__largeSubmit" value="submit">
                    <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="button__icon__path"
                              d="M86 896v-298l640-86-640-86v-298l896 384z"></path>
                    </svg>
                    Créer le nouveau sujet
                </button>
            </div>
        </div>
        <div class="editor__content">
            <ul class="editor__controls">
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Gras</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path" d="M576 662q28 0
                        46-19t18-45-18-45-46-19h-150v128h150zM426 278v128h128q26 0 45-19t19-45-19-45-45-19h-128zM666 460q92 42 92 146 0 68-45 115t-113 47h-302v-598h268q72 0 121 50t49 122-70 118z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Italique</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M426 170h342v128h-120l-144 342h94v128h-342v-128h120l144-342h-94v-128z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Souligné</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M214 810h596v86h-596v-86zM512 726q-106 0-181-75t-75-181v-342h106v342q0 62 44 105t106 43 106-43 44-105v-342h106v342q0 106-75 181t-181 75z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Barré</span>
                    <svg class="editor__controls__icon editor__controls__icon--small" version="1.1"
                         viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M982 512v86h-184l8 16q18 46 18 94 0 44-22 98-12 32-60 72-44 38-94 48-50 16-124 16-68 0-158-28-14-6-37-21t-31-19q-24-12-54-50t-40-68q-12-38-12-90h170q0 36 14 68 6 14 34 42 34 34 120 34 22 0 58-8 4-4 20-11t20-11q18-12 24-30 10-30 10-38 0-52-30-72-36-24-52-30-4-2-15-6t-15-6h-508v-86h940zM252 426q-12-12-14-16-20-44-20-94t26-94q32-80 158-120 50-16 122-16 88 0 134 20 48 10 98 52 40 34 58 80 22 54 22 104h-170q0-64-34-86-34-34-102-34-24 0-60 8-16 4-44 22-18 12-24 30-10 30-10 38 0 42 44 68 44 24 84 38h-268z"></path>
                    </svg>
                </li>
                <li class="editor__controls__separator"></li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Citer</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M598 726l84-172h-128v-256h256v256l-84 172h-128zM256 726l86-172h-128v-256h256v256l-86 172h-128z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Liste</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M298 214h598v84h-598v-84zM298 554v-84h598v84h-598zM298 810v-84h598v84h-598zM170 712q24 0 41 16t17 40-17 40-41 16-40-16-16-40 16-40 40-16zM170 192q26 0 45 18t19 46-19 46-45 18-45-18-19-46 19-46 45-18zM170 448q26 0 45 18t19 46-19 46-45 18-45-18-19-46 19-46 45-18z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Liste ordonnée</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M298 554v-84h598v84h-598zM298 810v-84h598v84h-598zM298 214h598v84h-598v-84zM86 470v-44h128v40l-78 88h78v44h-128v-40l76-88h-76zM128 342v-128h-42v-44h84v172h-42zM86 726v-44h128v172h-128v-44h84v-20h-42v-44h42v-20h-84z"></path>
                    </svg>
                </li>
                <li class="editor__controls__separator"></li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Lien</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M726 298q88 0 150 63t62 151-62 151-150 63h-172v-82h172q54 0 93-39t39-93-39-93-93-39h-172v-82h172zM342 554v-84h340v84h-340zM166 512q0 54 39 93t93 39h172v82h-172q-88 0-150-63t-62-151 62-151 150-63h172v82h-172q-54 0-93 39t-39 93z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Image</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M598 256l384 512h-940l256-342 192 256 68-50-120-162z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Vidéo YouTube</span>
                    <svg class="editor__controls__icon editor__controls__icon--small" version="1.1"
                         viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M731.429 512q0-21.143-17.143-30.857l-292.571-182.857q-17.714-11.429-37.143-1.143-18.857 10.286-18.857 32v365.714q0 21.714 18.857 32 9.143 4.571 17.714 4.571 11.429 0 19.429-5.714l292.571-182.857q17.143-9.714 17.143-30.857zM1024 512q0 54.857-0.571 85.714t-4.857 78-12.857 84.286q-9.143 41.714-39.429 70.286t-70.857 33.143q-126.857 14.286-383.429 14.286t-383.429-14.286q-40.571-4.571-71.143-33.143t-39.714-70.286q-8-37.143-12.286-84.286t-4.857-78-0.571-85.714 0.571-85.714 4.857-78 12.857-84.286q9.143-41.714 39.429-70.286t70.857-33.143q126.857-14.286 383.429-14.286t383.429 14.286q40.571 4.571 71.143 33.143t39.714 70.286q8 37.143 12.286 84.286t4.857 78 0.571 85.714z"></path>
                    </svg>
                </li>
                <li class="editor__controls__separator"></li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Citer un membre</span>
                    <svg class="editor__controls__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Citer un tag</span>
                    <svg class="editor__controls__icon editor__controls__icon--small" version="1.1"
                         viewBox="0 0 877.7142857142858 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M256 256q0-30.286-21.429-51.714t-51.714-21.429-51.714 21.429-21.429 51.714 21.429 51.714 51.714 21.429 51.714-21.429 21.429-51.714zM865.714 585.143q0 30.286-21.143 51.429l-280.571 281.143q-22.286 21.143-52 21.143-30.286 0-51.429-21.143l-408.571-409.143q-21.714-21.143-36.857-57.714t-15.143-66.857v-237.714q0-29.714 21.714-51.429t51.429-21.714h237.714q30.286 0 66.857 15.143t58.286 36.857l408.571 408q21.143 22.286 21.143 52z"></path>
                    </svg>
                </li>
                <li class="editor__controls__item">
                    <span class="editor__controls__item__name">Citer une partie</span>
                    <svg class="editor__controls__icon editor__controls__icon--small" version="1.1"
                         viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <path class="editor__controls__icon__path"
                              d="M995.533 479.283c-45.158-252.211-146.125-326.605-199.834-326.605-83.814 0-105.318 62.31-283.699 64.41-178.381-2.099-199.885-64.41-283.699-64.41-53.709 0-154.726 74.394-199.885 326.605-25.754 143.974-53.709 358.912 12.902 384.717 82.893 32.102 111.002-48.179 202.035-116.019 92.416-68.762 136.755-84.941 268.646-84.941s176.23 16.179 268.646 84.941c91.034 67.789 119.142 148.122 202.035 116.019 66.611-25.805 38.656-240.691 12.851-384.717zM307.2 512c-56.576 0-102.4-45.875-102.4-102.4 0-56.576 45.824-102.4 102.4-102.4s102.4 45.824 102.4 102.4c0 56.525-45.875 102.4-102.4 102.4zM665.6 512c-28.314 0-51.2-22.886-51.2-51.2s22.886-51.2 51.2-51.2c28.314 0 51.2 22.886 51.2 51.2s-22.886 51.2-51.2 51.2zM768 409.6c-28.314 0-51.2-22.886-51.2-51.2s22.886-51.2 51.2-51.2c28.314 0 51.2 22.886 51.2 51.2s-22.886 51.2-51.2 51.2z"></path>
                    </svg>
                </li>
            </ul>
            <div class="editor__body">
                <label for="lol" class="form__largeLabel form__largeLabel--withSmall">Contenu de votre message
                    :<br>
                    <small>Rappelez vous que vous pouvez prévisualiser votre message avant de poster</small>
                </label>
                <textarea placeholder="Faîtes attention à l'orthographe" class="form__largeInput
                form__largeInput--noMargin form__largeInput--textArea" name="lol" id="lol"></textarea>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection