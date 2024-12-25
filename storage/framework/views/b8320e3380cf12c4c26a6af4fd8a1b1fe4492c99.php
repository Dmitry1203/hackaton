<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Мой профиль. Редактирование <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 
        <div class="content account__user">
            <div class="content-header">
                <h3>Мой профиль</h3>
                <a href="<?php echo e(Route('personal.profile')); ?>"
                    class="button button__block button__filled button__medium">Просмотр профиля</a>
            </div>
            <div class="account-layout">
                <form id="profile-form" name="profile-form" class="account-form settings-form"
                    action="<?php echo e(Route('personal.profile.update')); ?>" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-row">
                        <div class="column col">
                            <h5>Контактные данные ученика</h5>
                            <div class="form-block">
                                <div class="form-group">
                                    <label for="surname" class="body-text-large">Фамилия*</label>
                                    <input type="text" name="surname" class="form-control" id="surname"
                                        placeholder="Фамилия" value="<?php echo e(auth()->user()->surname); ?>" data-required="1"
                                        maxlength="32">
                                    <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div></div>
                                    <p class="error-message body-text-small"><?php echo $message; ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="body-text-large">Имя*</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя"
                                        value="<?php echo e(auth()->user()->name); ?>" data-required="1" maxlength="32">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div></div>
                                    <p class="error-message body-text-small"><?php echo $message; ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="body-text-large">Телефон*</label>
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        placeholder="+7(___) ___-__-__" value="<?php echo e(auth()->user()->phone); ?>"
                                        data-required="1">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div></div>
                                    <p class="error-message body-text-small"><?php echo $message; ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="birthdate" class="body-text-large">Дата рождения*</label>
                                    <input type="text" name="birthdate" class="form-control" id="birthdate"
                                        data-value="<?php echo e(is_null(auth()->user()->date_b) ? '' : _date_MM_DD_YYYY(auth()->user()->date_b)); ?>"
                                        data-required="1">
                                    <?php $__errorArgs = ['birthdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div></div>
                                    <p class="error-message body-text-small"><?php echo $message; ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="school" class="body-text-large">Учебное заведение*</label>
                                    <input type="text" name="school" class="form-control" id="school"
                                        placeholder="Учебное заведение" value="<?php echo e(auth()->user()->school); ?>"
                                        data-required="1">
                                    <?php $__errorArgs = ['school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div></div>
                                    <p class="error-message body-text-small"><?php echo $message; ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="class" class="body-text-large">Класс*</label>
                                    <input type="text" name="class" class="form-control" id="class" placeholder="Класс"
                                        value="<?php echo e(auth()->user()->class); ?>" data-required="1">
                                    <?php $__errorArgs = ['class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div></div>
                                    <p class="text-danger"><?php echo $message; ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="about-me" class="body-text-large">О себе*</label>
                                    <div class="input-group">
                                        <textarea type="text" name="about-me" class="form-control" id="about-me"
                                            placeholder="Расскажите о себе" data-required="1"
                                            maxlength="256"><?php echo e(auth()->user()->about_me); ?></textarea>
                                        <div class="textarea-counter body-text-small"><span>0</span>/256</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column col">
                            <h5>
                                Фотография профиля
                            </h5>
                            <div class="form-block">
                                <div class="account-photo">

                                    <div class="preview">
                                        <?php if(empty(auth()->user()->avatar) ): ?>
                                        <img src="/images/user-default.png">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset("storage/images/avatars/".auth()->user()->avatar)); ?>"
                                            alt="<?php echo e(auth()->user()->name); ?> <?php echo e(auth()->user()->surname); ?>">
                                        <?php endif; ?>
                                    </div>

                                    <div class="action">
                                        <div class="custom-upload custom-upload-simple">

                                            <?php if(empty(auth()->user()->avatar) ): ?>
                                            <input type="hidden" name="required">
                                            <?php else: ?>
                                            <input type="hidden" name="required" value="1">
                                            <?php endif; ?>

                                            <label>
                                                <input type="file" class="custom-file-input" id="avatar" name="avatar"
                                                    accept=".jpg, .jpeg, .png">

                                                <?php if(empty(auth()->user()->avatar) ): ?>
                                                <div class="custom-upload-button body-text-regular">Загрузить
                                                    фотографию*</div>
                                                <?php else: ?>
                                                <div class="custom-upload-button body-text-regular">Обновить фотографию
                                                </div>
                                                <?php endif; ?>

                                            </label>
                                            <div class="required-message body-text-small">Загрузка фото обязательна
                                            </div>
                                            <div class="error-message body-text-small"></div>
                                        </div>
                                        <div class="note body-text-small">Не больше 5 Мб</div>
                                        <div class="note body-text-small">Допустимые форматы файлов - .jpg, .png</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Контактные данные родителя (законного представителя)</h5>
                        <div class="form-row">
                            <div class="column col">
                                <div class="form-block">
                                    <div class="form-group">
                                        <label for="parent-surname" class="body-text-large">Фамилия*</label>
                                        <input type="text" name="parent-surname" class="form-control"
                                            id="parent-surname" placeholder="Фамилия"
                                            value="<?php echo e(auth()->user()->parent_surname); ?>" data-required="1">
                                        <?php $__errorArgs = ['parent-surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div></div>
                                        <p class="error-message body-text-small"><?php echo $message; ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent-name" class="body-text-large">Имя*</label>
                                        <input type="text" name="parent-name" class="form-control" id="parent-name"
                                            placeholder="Имя" value="<?php echo e(auth()->user()->parent_name); ?>"
                                            data-required="1">
                                        <?php $__errorArgs = ['parent-name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div></div>
                                        <p class="error-message body-text-small"><?php echo $message; ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent-patronym" class="body-text-large">Отчество*</label>
                                        <input type="text" name="parent-patronym" class="form-control"
                                            id="parent-patronym" placeholder="Отчество"
                                            value="<?php echo e(auth()->user()->parent_patronym); ?>" data-required="1">
                                        <?php $__errorArgs = ['parent-patronym'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div></div>
                                        <p class="error-message body-text-small"><?php echo $message; ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent-phone" class="body-text-large">Телефон*</label>
                                        <input type="tel" name="parent-phone" class="form-control" id="parent-phone"
                                            placeholder="+7(___) ___-__-__" value="<?php echo e(auth()->user()->parent_phone); ?>"
                                            data-required="1">
                                        <?php $__errorArgs = ['parent-phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div></div>
                                        <p class="error-message body-text-small"><?php echo $message; ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(!empty(auth()->user()->parent_surname_2) || !empty(auth()->user()->parent_name_2)): ?>
                    <div class="form-section additional-section d-block">
                        <?php else: ?>
                        <div class="form-section additional-section">
                            <?php endif; ?>

                            <h5>Контактные данные второго родителя (законного представителя)</h5>
                            <div class="form-row">
                                <div class="column col">
                                    <div class="form-block">
                                        <div class="form-group">
                                            <label for="parent-surname-2" class="body-text-large">Фамилия</label>
                                            <input type="text" name="parent-surname-2" class="form-control"
                                                id="parent-surname-2" placeholder="Фамилия"
                                                value="<?php echo e(auth()->user()->parent_surname_2); ?>">
                                            <?php $__errorArgs = ['parent-surname-2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div></div>
                                            <p class="error-message body-text-small"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent-name-2" class="body-text-large">Имя</label>
                                            <input type="text" name="parent-name-2" class="form-control"
                                                id="parent-name-2" placeholder="Имя"
                                                value="<?php echo e(auth()->user()->parent_name_2); ?>">
                                            <?php $__errorArgs = ['parent-name-2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div></div>
                                            <p class="error-message body-text-small"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent-patronym-2" class="body-text-large">Отчество</label>
                                            <input type="text" name="parent-patronym-2" class="form-control"
                                                id="parent-patronym-2" placeholder="Отчество"
                                                value="<?php echo e(auth()->user()->parent_patronym_2); ?>">
                                            <?php $__errorArgs = ['parent-patronym-2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div></div>
                                            <p class="error-message body-text-small"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent-phone-2" class="body-text-large">Телефон</label>
                                            <input type="tel" name="parent-phone-2" class="form-control"
                                                id="parent-phone-2" placeholder="+7(___) ___-__-__"
                                                value="<?php echo e(auth()->user()->parent_phone_2); ?>">
                                            <?php $__errorArgs = ['parent-phone-2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div></div>
                                            <p class="error-message body-text-small"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="column col">
                                <div class="form-actions">

                                    <?php if(
                                    empty(auth()->user()->parent_surname_2) &&
                                    empty(auth()->user()->parent_name_2) &&
                                    empty(auth()->user()->parent_patronym_2) &&
                                    empty(auth()->user()->parent_phone_2)
                                    ): ?>

                                    <button type="button" class="additional-section__button button button__large">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                        Добавить родителя
                                    </button>

                                    <?php endif; ?>

                                    <button type="submit"
                                        class="submit-button button button__block button__filled button__large">
                                        <span class="loader"></span>
                                        <span>Сохранить изменения</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                </form>

                <form class="account-form password-form" id="change-password" name="change-password" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="column col">
                            <h5>Смена пароля</h5>
                            <div class="form-block">
                                <div class="form-group">
                                    <label for="сurrent-password" class="body-text-large">Текущий пароль</label>
                                    <div class="input-group">
                                        <input type="password" id="сurrent-password" name="сurrent-password"
                                            class="form-control" placeholder="Пароль" data-required="1">
                                    </div>
                                    <div></div>
                                    <p id="сurrent-password-error" class="error-message body-text-small"></p>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="body-text-large">Новый пароль</label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Пароль (не менее 8 символов)" data-required="1">
                                    </div>
                                    <div></div>
                                    <p id="password-error" class="error-message body-text-small"></p>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirmation" class="body-text-large">Повторить пароль</label>
                                    <div class="input-group">
                                        <input type="password" id="password-confirmation" name="password-confirmation"
                                            class="form-control" placeholder="Пароль" data-required="1">
                                    </div>
                                    <div></div>
                                    <p id="password-confirmation-error" class="error-message body-text-small"></p>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit"
                                    class="submit-button button button__block button__filled button__large">Изменить
                                    пароль</button>
                                <div class="body-text-large text-success mt-3" id="password-change-success"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/profileEdit.blade.php ENDPATH**/ ?>