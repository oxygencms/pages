<div class="row">
    <!-- layout -->
    <div class="form-group col-6">
        <label for="layout">Layout</label>
        <select class="form-control"
                id="layout"
                name="layout"
        >
            @foreach($layouts['list'] as $layout)
                <option value="{{ $layout }}"
                        {{ $layout == old('layout', optional($page)->layout) ? 'selected' : null }}
                >
                    {{ $layout }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-muted">{{ $layouts['path'] }}</small>
    </div>

    <!-- template -->
    <div class="form-group col-6">
        <label for="template">Template</label>
        <select class="form-control"
                id="template"
                name="template"
        >
            @foreach($templates['list'] as $template)
                <option value="{{ $template }}"
                        {{ $template == old('template', optional($page)->template) ? 'selected' : null }}
                >
                    {{ $template }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-muted">{{ $templates['path'] }}</small>
    </div>
</div>

<!-- tabs nav -->
<ul class="nav nav-tabs" role="tablist">
    @foreach(config('oxygen.locales') as $locale => $locale_name)
        <li class="nav-item">
            <a class="nav-link {{ app()->getLocale() == $locale ? 'active' : '' }}"
               id="{{ "tab-$locale" }}"
               href="{{ "#tab-$locale-content" }}"
               role="tab"
               data-toggle="tab"
               aria-controls="{{ "tab-$locale-content" }}"
            >
                {{ "$locale_name ($locale)" }}
            </a>
        </li>
    @endforeach
</ul>

<!-- tabs content -->
<div class="tab-content" style="padding-top: 15px;">
    @foreach(config('oxygen.locales') as $locale => $locale_name)
        <div class="tab-pane fade {{ app()->getLocale() == $locale ? 'show active' : null }}"
             id="{{ "tab-$locale-content" }}"
             role="tabpanel"
             aria-labelledby="{{ "tab-$locale" }}"
        >
            <!-- title -->
            <div class="form-group">
                <label for="{{ "title-$locale" }}">Title <strong>*</strong></label>
                <input type="text"
                       class="form-control {{ $errors->has("title.$locale") ? 'is-invalid' : null }}"
                       id="{{ "title-$locale" }}"
                       name="{{ "title[$locale]" }}"
                       placeholder="Enter page title..."
                       value="{{ old("title.$locale", optional($page)->getTranslation('title', $locale)) }}"
                >
                {!! $errors->first("title.$locale", '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <!-- slug -->
            <div class="form-group">
                <label for="{{ "slug-$locale" }}">Slug <strong>*</strong></label>
                <input type="text"
                       class="form-control {{ $errors->has("slug.$locale") ? 'is-invalid' : null }}"
                       id="{{ "slug-$locale" }}"
                       name="{{ "slug[$locale]" }}"
                       placeholder="Enter page slug... Format: (a-to-z-dashes-and-0-9)"
                       value="{{ old("slug.$locale", optional($page)->getTranslation('slug', $locale)) }}"
                >
                {!! $errors->first("slug.$locale", '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <!-- summary -->
            <div class="form-group">
                <label for="{{ "summary-$locale" }}">Summary</label>
                <input type="text"
                       class="form-control {{ $errors->has("summary.$locale") ? 'is-invalid' : null }}"
                       id="{{ "summary-$locale" }}"
                       name="{{ "summary[$locale]" }}"
                       placeholder="Enter page summary..."
                       value="{{ old("summary.$locale", optional($page)->getTranslation('summary', $locale)) }}"
                >
                {!! $errors->first("summary.$locale", '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <!-- body -->
            <div class="form-group">
                <label for="{{ "body-$locale" }}">Body</label>
                <textarea class="form-control"
                          id="{{ "body-$locale" }}"
                          name="{{ "body[$locale]" }}"
                          rows="11"
                          placeholder="Enter page body..."
                >{{ old("body.$locale", optional($page)->getTranslation('body', $locale)) }}</textarea>
            </div>

            <!-- meta keywords -->
            <div class="form-group">
                <label for="{{ "meta_keywords-$locale" }}">Meta Keywords</label>
                <input type="text"
                       class="form-control {{ $errors->has("meta_keywords.$locale") ? 'is-invalid' : null }}"
                       id="{{ "meta_keywords-$locale" }}"
                       name="{{ "meta_keywords[$locale]" }}"
                       placeholder="Enter page meta keywords..."
                       value="{{ old("meta_keywords.$locale", optional($page)->getTranslation('meta_keywords', $locale)) }}"
                >
                {!! $errors->first("meta_keywords.$locale", '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <!-- meta description -->
            <div class="form-group">
                <label for="{{ "meta_description-$locale" }}">Meta Description</label>
                <input type="text"
                       class="form-control {{ $errors->has("meta_description.$locale") ? 'is-invalid' : null }}"
                       id="{{ "meta_description-$locale" }}"
                       name="{{ "meta_description[$locale]" }}"
                       placeholder="Enter page meta description..."
                       value="{{ old("meta_description.$locale", optional($page)->getTranslation('meta_description', $locale)) }}"
                >
                {!! $errors->first("meta_description.$locale", '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <!-- meta tags -->
            {{--<div class="form-group">--}}
                {{--<label for="{{ "meta_tags-$locale" }}">Meta Tags</label>--}}
                {{--<input type="text"--}}
                       {{--class="form-control {{ $errors->has("meta_tags.$locale") ? 'is-invalid' : null }}"--}}
                       {{--id="{{ "meta_tags-$locale" }}"--}}
                       {{--name="{{ "meta_tags[$locale]" }}"--}}
                       {{--placeholder="Enter page meta tags..."--}}
                       {{--value="{{ old("meta_tags.$locale", optional($page)->getTranslation('meta_tags', $locale)) }}"--}}
                {{-->--}}
                {{--{!! $errors->first("meta_tags.$locale", '<small class="form-text text-danger">:message</small>') !!}--}}
            {{--</div>--}}
        </div>
    @endforeach
</div>

@include('oxygencms::admin.partials.tinymce', ['selector' => '#body-en', 'model' => $page])