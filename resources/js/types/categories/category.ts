export interface Category {
    id: number;
    name: string;
    description?: string;
    sub_categories_count?: number;
    sub_categories?: SubCategory[];
    created_at: string;
    updated_at: string;
}

export interface SubCategory {
    id: number;
    name: string;
    description?: string;
    category_id: number;
    created_at: string;
    updated_at: string;
}

export interface SubCategoryEdit {
    name: string;
    description?: string;
    id?: number;
    delete?: boolean;
}
